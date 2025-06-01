<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BudgetController extends Controller
{



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

        return $data;
    }

    public function budget(Request $request)
    {
        $key_counter = 0;
        $budget_counter = 0;
        $products_data = [];

        // Loop through up to 5 keys and budgets
        for ($i = 1; $i <= 5; $i++) {
            if ($request->filled('key' . $i)) {
                $key = $request->input('key' . $i);
                if ($request->filled('budget' . $i)) {
                    $budget = $request->input('budget' . $i);
                    $budget_counter++;
                } else {
                    return redirect()->back()->with("errors", ["Please enter the budget for $key"]);
                }

                $filename_raneen = "C:\\xampp\\htdocs\\Budgetko\\public\\asset\\json\\raneen_$key.json";
                $filename_jumia = "C:\\xampp\\htdocs\\Budgetko\\public\\asset\\json\\jumia_$key.json";
                $filename_elaraby = "C:\\xampp\\htdocs\\Budgetko\\public\\asset\\json\\elaraby_$key.json";

                $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\"";
                $code_jumia = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\"";
                $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\"";

                $products_data[$i] = [
                    'key' => $key,
                    'budget' => $budget,
                    'raneen' => $this->files($code_raneen, $filename_raneen),
                    'jumia' => $this->files($code_jumia, $filename_jumia),
                    'elaraby' => $this->files($code_elaraby, $filename_elaraby),
                ];

                $key_counter++;
            }
        }

        // Ensure the user entered the required number of budgets
        if ($budget_counter < $key_counter) {
            return redirect()->back()->with('errors', "You must enter at least $key_counter budgets.");
        }

        // Prepare the data for the view
        $search_products = [];
        for ($i = 1; $i <= $key_counter; $i++) {
            $search_counter = 0;
            $search_products[$i] = [];

            foreach ($products_data[$i]['raneen']['products'] as $product) {
                if (floatval($product['price']) <= $products_data[$i]['budget']) {
                    $search_products[$i][$search_counter] = ['raneen', $product];
                    $search_counter++;
                }
            }

            foreach ($products_data[$i]['jumia']['products'] as $product) {
                if (floatval($product['price']) <= $products_data[$i]['budget']) {
                    $search_products[$i][$search_counter] = ['jumia', $product];
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

        // Return the view with the search results
        return view('user.budget-details', array_merge($search_products, ['count' => $count]));
    }

    //قفلة قوس ال كلاس
}
