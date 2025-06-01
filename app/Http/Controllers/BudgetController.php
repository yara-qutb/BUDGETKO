<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{

    private function normalizePrice($data)
    {
        foreach ($data['products'] as &$item) {
            if (isset($item['price'])) {
                // Remove commas from the price
                $item['price'] = str_replace(',', '', $item['price']);
            }
        }
        return $data;
    }


    public function files($code, $path)
    {

        if (file_exists($path)) {
            $var = file_get_contents($path); // Use $filename_elaraby here
            $data = json_decode($var, true);
        } else {
            $search = shell_exec($code);
            if (file_exists($path)) {
                $var = file_get_contents($path); // Use $filename_elaraby here
                $data = json_decode($var, true);
            }
        }
        $data=$this->normalizePrice($data);

        return $data;
    }

    public function budget(Request $request)
    {

        $locale = App::getLocale();
        $key_counter = 0;
        $budget_counter = 0;
        $products_data = [];
        $main_budget = $request->input('main_budget');
        $total_budget_entered = 0;
        if (!$request->filled('main_budget')) {
            if ($locale == 'ar') {
                return redirect()->back()->with("errors", ["الرجاء إدخال الميزانية الرئيسية"]);
            }else{
                return redirect()->back()->with("errors", ["Please enter the main budget"]);
            }
        }
        // Loop through up to 5 keys and budgets
        for ($i = 1; $i <= 5; $i++) {
            if ($request->filled('key' . $i)) {
                $key = $request->input('key' . $i);
                if ($request->filled('budget' . $i)) {
                    $budget = $request->input('budget' . $i);
                    $total_budget_entered += $budget;
                    $budget_counter++;
                } else {
                    $budget = null; // Placeholder for the missing budget
                }

                $filename_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
                $filename_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
                $filename_elaraby  = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
                $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
                $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
                $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";

                $products_data[$i] = [
                    'key' => $key,
                    'budget' => $budget,
                    'jumia' => $this->files($code_jumia, $filename_jumia),
                    'raneen' => $this->files($code_raneen, $filename_raneen),
                    'elaraby' => $this->files($code_elaraby, $filename_elaraby),
                ];

                $key_counter++;
            }
        }

        // Ensure at least one item is entered
        if ($key_counter == 0) {
            if ($locale == 'ar') {
                return redirect()->back()->with("errors", ["الرجاء إدخال عنصر واحد على الأقل."]);
            }else{
                return redirect()->back()->with("errors", ["Please enter at least one item."]);
            }
        }
        if($total_budget_entered>$main_budget){
            if ($locale == 'ar') {
                return redirect()->back()->with('errors', ["لقد تجاوزت ميزانيتك الأساسية"] );
            }else{
                return redirect()->back()->with('errors', ["Your Item's budget exceeds the main budget"] );
            }
        }
        // Ensure the user entered the required number of budgets
        if ($budget_counter < $key_counter - 1) {
            if ($locale == 'ar') {
                return redirect()->back()->with('errors', ["يجب عليك إدخال ميزانيات على الأقل " . ($key_counter - 1) . " items."]);
            }else{
                return redirect()->back()->with('errors',[ "You must enter budgets for at least " . ($key_counter - 1) . " items."]);
            }
        }
        // Calculate the missing budget if necessary
        if ($budget_counter == $key_counter - 1) {
            $missing_budget = $main_budget - $total_budget_entered;
            if ($missing_budget <= 0) {
                if ($locale == 'ar') {
                    return redirect()->back()->with('errors',[ "إجمالي الميزانيات المدخلة يتجاوز الميزانية الرئيسية."]);
                }else{
                    return redirect()->back()->with('errors', ["The total of entered budgets exceeds the main budget."]);
                }
            }

            // Assign the missing budget to the first product without a budget
            for ($i = 1; $i <= $key_counter; $i++) {
                if (is_null($products_data[$i]['budget'])) {
                    $products_data[$i]['budget'] = $missing_budget;
                    break;
                }
            }
        }

        // Prepare the data for the view
        $search_products = [];
        for ($i = 1; $i <= $key_counter; $i++) {
            $search_counter = 0;
            $search_products[$i] = [];
            foreach ($products_data[$i]['jumia']['products'] as $product) {
                if (floatval($product['price']) <= $products_data[$i]['budget']) {
                    $search_products[$i][$search_counter] = ['jumia', $product];
                    $search_counter++;
                }
            }


            foreach ($products_data[$i]['raneen']['products'] as $product) {
                if (floatval($product['price']) <= $products_data[$i]['budget']) {
                    $search_products[$i][$search_counter] = ['raneen', $product];
                    $search_counter++;
                }
            }



            foreach ($products_data[$i]['elaraby']['products'] as $product) {
                if (floatval($product['price']) <= $products_data[$i]['budget']) {
                    $search_products[$i][$search_counter] = ['elaraby', $product];
                    $search_counter++;
                }
            }
        }

        // Determine the minimum count among the search products
        $counts = array_map('count', $search_products);
        $count = min($counts);
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            // Return the view with the search results
            return view('user.budget-details', ['userName' => $userName,'search_products' => $search_products, 'count' => $count]);
        }else{
            return view('user.budget-details', ['search_products' => $search_products, 'count' => $count]);
        }
    }

    //قفلة قوس ال كلاس
}
