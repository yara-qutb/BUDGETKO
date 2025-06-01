<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private function normalizePrice($data)
    {
        if(!empty($data['products'])){

            foreach ($data['products'] as &$item) {
                if (isset($item['price'])) {
                    // Remove commas from the price
                    $item['price'] = str_replace(',', '', $item['price']);
                }
            }
            return $data;
        }
    }
    public function files($code, $path)
    {

        if (file_exists($path)) {
            $var = file_get_contents($path); // Use $filename_elaraby here
            $data = json_decode($var, true);
            return $data;
        } else {
            $search = shell_exec($code);
            if (file_exists($path)) {
                $var = file_get_contents($path); // Use $filename_elaraby here
                $data = json_decode($var, true);
                return $data;
            }
        }
    }

    public function home()
    {
        ///////////////////recommended///////////////////////////////////
        $locale =App::getLocale();
        $key1 = "recommended";
        if($locale=="ar"){
            $key1 = "مقترح";
        }

        $path = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key1 . '.json';
        $run="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key1\" -a lang=\"$locale\"";

        $data=$this->files($run,$path);
        $data = $this->normalizePrice($data);
        ///////////////////END recommended///////////////////////////////////

        ////////////////////////////most selling///////////////////////////////
        $key2 = "sale";
        if($locale=="ar"){
            $key2 = "عروض";
        }
        $path2 = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key2 . '.json';
        $run2="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key2\" -a lang=\"$locale\"";
        $data2=$this->files($run2,$path2);
        $data2 = $this->normalizePrice($data2);
        ////////////////////////////END most selling///////////////////////////////

        //////////////////////////top offers//////////////////////////////////////
        $key3 = "offers";
        if($locale=="ar"){
            $key3 = "اجهزة";
        }
        $path3 = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key3 . '.json';
        $run3="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key3\" -a lang=\"$locale\"";
        $data3=$this->files($run3,$path3);
        $data3= $this->normalizePrice($data3);
        //////////////////////////END top offers//////////////////////////////////////

        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            return view('welcome', ['data' => $data, 'data3' => $data3, 'data2' => $data2, 'userName' => $userName]);
        }else{
            return view('welcome', ['data' => $data, 'data3' => $data3, 'data2' => $data2]);

        }
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();
        $locale = App::getLocale();
        if ($locale == 'ar') {
            return redirect()->back()->with('success', 'تم تحديث المنتج في سلة التسوق بنجاح.');
        }else{
            return redirect()->back()->with('success', 'Cart item updated successfully.');
        }
    }

    public function scrapeProducts($i)
    {
        $locale = App::getLocale();
        $key1 = "recommended";
        $path ='C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key1 . '.json';
        $data = file_get_contents($path);
        $data = json_decode($data, true);
        $product = $data['products'][$i];
        $key=$product['name'];
        $site_counter=0;
        $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
        $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
        $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
        $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $data_raneen = $this->files($code_raneen, $path_raneen);
        $data_jumia = $this->files($code_jumia, $path_jumia);
        $data_elaraby = $this->files($code_elaraby, $path_elaraby);
        $data_raneen = $this->normalizePrice($data_raneen);
        $data_jumia = $this->normalizePrice($data_jumia);
        $data_elaraby = $this->normalizePrice($data_elaraby);
        if(!empty($data_elaraby['products'])){
            $site_counter++;
        }
        if(!empty($data_raneen['products'])){
            $site_counter++;
        }
        if(!empty($data_jumia['products'])){
            $site_counter++;
        }
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            return view('user.product', ['userName' => $userName, 'product' => $product,'data'=>$data,'data_jumia'=>$data_jumia,'data_elaraby'=>$data_elaraby,'data_raneen'=>$data_raneen , 'site_counter'=>$site_counter]);
        } else {
            return view('user.product', ['product' => $product,'data'=>$data,'data_jumia'=>$data_jumia,'data_elaraby'=>$data_elaraby,'data_raneen'=>$data_raneen , 'site_counter'=>$site_counter]);
        }
    }

    public function topOffers($x)
    {
        $locale = App::getLocale();
        $key1 = "sale";
        $path = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key1 . '.json';
        $data = file_get_contents($path);
        $data = json_decode($data, true);
        $product = $data['products'][$x];
        $key=$product['name'];
        $site_counter=0;
        $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
        $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
        $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
        $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";

        $data_raneen = $this->files($code_raneen, $path_raneen);
        $data_jumia = $this->files($code_jumia, $path_jumia);
        $data_elaraby = $this->files($code_elaraby, $path_elaraby);

        $data_raneen = $this->normalizePrice($data_raneen);
        $data_jumia = $this->normalizePrice($data_jumia);
        $data_elaraby = $this->normalizePrice($data_elaraby);
        if(!empty($data_elaraby['products'])){
            $site_counter++;
        }
        if(!empty($data_raneen['products'])){
            $site_counter++;
        }
        if(!empty($data_jumia['products'])){
            $site_counter++;
        }
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            return view('user.product', ['userName' => $userName, 'product' => $product,'data'=>$data,'data_jumia'=>$data_jumia,'data_elaraby'=>$data_elaraby,'data_raneen'=>$data_raneen , 'site_counter'=>$site_counter]);
        } else {
            return view('user.product', ['product' => $product,'data'=>$data,'data_jumia'=>$data_jumia,'data_elaraby'=>$data_elaraby,'data_raneen'=>$data_raneen , 'site_counter'=>$site_counter]);
        }
    }


    public function sales($y)
    {
        $locale = App::getLocale();
        $key1 = "offers";
        $path = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key1 . '.json';
        $data = file_get_contents($path);
        $data = json_decode($data, true);
        $product = $data['products'][$y];
        $key=$product['name'];
        $site_counter=0;
        $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
        $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
        $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
        $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";

        $data_raneen = $this->files($code_raneen, $path_raneen);
        $data_jumia = $this->files($code_jumia, $path_jumia);
        $data_elaraby = $this->files($code_elaraby, $path_elaraby);
        $data_raneen = $this->normalizePrice($data_raneen);
        $data_jumia = $this->normalizePrice($data_jumia);
        $data_elaraby = $this->normalizePrice($data_elaraby);
        if(!empty($data_elaraby['products'])){
            $site_counter++;
        }
        if(!empty($data_raneen['products'])){
            $site_counter++;
        }
        if(!empty($data_jumia['products'])){
            $site_counter++;
        }
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            return view('user.product', ['userName' => $userName,'product' => $product,'data'=>$data,'data_jumia'=>$data_jumia,'data_elaraby'=>$data_elaraby,'data_raneen'=>$data_raneen , 'site_counter'=>$site_counter]);
        } else {
            return view('user.product', ['product' => $product,'data'=>$data,'data_jumia'=>$data_jumia,'data_elaraby'=>$data_elaraby,'data_raneen'=>$data_raneen , 'site_counter'=>$site_counter]);
        }
    }


    public function category($trans)
    {
        $key = $trans;
        $locale = App::getLocale();
        $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
        $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
        $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
        $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";

        $data_raneen = $this->files($code_raneen, $path_raneen);
        $data_jumia = $this->files($code_jumia, $path_jumia);
        $data_elaraby = $this->files($code_elaraby, $path_elaraby);
        $data_raneen = $this->normalizePrice($data_raneen);
        $data_jumia = $this->normalizePrice($data_jumia);
        $data_elaraby = $this->normalizePrice($data_elaraby);
        if (!empty($data_jumia) && !empty($data_elaraby) && !empty($data_raneen)) {
            if (Auth::check()) {
                $fullName = Auth::user()->name;
                $userName = explode(' ', $fullName)[0];
                return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);
            } else {
                return view('user.search', ['data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);
            }
        } else if (!empty($data_jumia) && !empty($data_elaraby) && empty($data_raneen)) {
            if (Auth::check()) {
                $fullName = Auth::user()->name;
                $userName = explode(' ', $fullName)[0];
                return view('user.search', ['userName' => $userName,'data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);
            } else {
            return view('user.search', ['data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);
            }
        } else if (!empty($data_jumia) && empty($data_elaraby) && !empty($data_raneen)) {
            if (Auth::check()) {
                $fullName = Auth::user()->name;
                $userName = explode(' ', $fullName)[0];
                return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'data_jumia' => $data_jumia, 'key' => $key]);
            } else {
                return view('user.search', ['data_raneen' => $data_raneen, 'data_jumia' => $data_jumia, 'key' => $key]);
            }
        } else if (empty($data_jumia) && !empty($data_elaraby) && !empty($data_raneen)) {
            if (Auth::check()) {
                $fullName = Auth::user()->name;
                $userName = explode(' ', $fullName)[0];
                return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'key' => $key]);
            } else {
                return view('user.search', ['data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'key' => $key]);
            }
        } else if (empty($data_jumia) && empty($data_elaraby) && !empty($data_raneen)) {
            if (Auth::check()) {
                $fullName = Auth::user()->name;
                $userName = explode(' ', $fullName)[0];
                return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'key' => $key]);
            } else {
                return view('user.search', ['data_raneen' => $data_raneen, 'key' => $key]);
            }
        } else if (!empty($data_jumia) && empty($data_elaraby) && empty($data_raneen)) {
            if (Auth::check()) {
                $fullName = Auth::user()->name;
                $userName = explode(' ', $fullName)[0];
                return view('user.search', ['userName' => $userName,'data_jumia' => $data_jumia, 'key' => $key]);
            } else {
                return view('user.search', ['data_jumia' => $data_jumia, 'key' => $key]);
            }
        } else if (empty($data_jumia) && !empty($data_elaraby) && empty($data_raneen)) {
            if (Auth::check()) {
                $fullName = Auth::user()->name;
                $userName = explode(' ', $fullName)[0];
                return view('user.search', ['userName' => $userName,'data_elaraby' => $data_elaraby, 'key' => $key]);
            } else {
                return view('user.search', ['data_elaraby' => $data_elaraby, 'key' => $key]);
            }
        } else if (empty($data_jumia) && empty($data_elaraby) && empty($data_raneen)) {
            if ($locale == 'ar') {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'errors' => "لا يوجد نتيجة", 'key' => $key]);
                } else {
                    return view('user.search', ['errors' => "لا يوجد نتيجة", 'key' => $key]);
                }
            }else{
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'errors' => "No Results Found", 'key' => $key]);
                } else {
                    return view('user.search', ['errors' => "No Results Found", 'key' => $key]);
                }
            }
        }
    }

    ///////////////////////SEARCH///////////////////////////////////////////
    public function search(Request $request)
    {
        $locale = App::getLocale();
        $key = $request->input('key');
        if($key != null){
            $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
            $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
            $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
            $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
            $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
            $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";
            $data_raneen = $this->files($code_raneen, $path_raneen);
            $data_jumia = $this->files($code_jumia, $path_jumia);
            $data_elaraby = $this->files($code_elaraby, $path_elaraby);
            $data_raneen = $this->normalizePrice($data_raneen);
            $data_jumia = $this->normalizePrice($data_jumia);
            $data_elaraby = $this->normalizePrice($data_elaraby);
            if (!empty($data_jumia) && !empty($data_elaraby) && !empty($data_raneen)) {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);
                } else {
                    return view('user.search', ['data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);
                }
            } else if (!empty($data_jumia) && !empty($data_elaraby) && empty($data_raneen)) {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);

                } else {
                    return view('user.search', ['data_elaraby' => $data_elaraby, 'data_jumia' => $data_jumia, 'key' => $key]);
                }
            } else if (!empty($data_jumia) && empty($data_elaraby) && !empty($data_raneen)) {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'data_jumia' => $data_jumia, 'key' => $key]);

                } else {
                    return view('user.search', ['data_raneen' => $data_raneen, 'data_jumia' => $data_jumia, 'key' => $key]);
                }
            } else if (empty($data_jumia) && !empty($data_elaraby) && !empty($data_raneen)) {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'key' => $key]);

                } else {
                    return view('user.search', ['data_raneen' => $data_raneen, 'data_elaraby' => $data_elaraby, 'key' => $key]);
                }
            } else if (empty($data_jumia) && empty($data_elaraby) && !empty($data_raneen)) {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'data_raneen' => $data_raneen, 'key' => $key]);

                } else {
                    return view('user.search', ['data_raneen' => $data_raneen, 'key' => $key]);
                }
            } else if (!empty($data_jumia) && empty($data_elaraby) && empty($data_raneen)) {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'data_jumia' => $data_jumia, 'key' => $key]);

                } else {
                    return view('user.search', ['data_jumia' => $data_jumia, 'key' => $key]);
                }
            } else if (empty($data_jumia) && !empty($data_elaraby) && empty($data_raneen)) {
                if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'data_elaraby' => $data_elaraby, 'key' => $key]);

                } else {
                    return view('user.search', ['data_elaraby' => $data_elaraby, 'key' => $key]);
                }
            } else if (empty($data_jumia) && empty($data_elaraby) && empty($data_raneen)) {

                if ($locale == 'ar') {
                    if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'errors' => ["لا يوجد نتيجة"], 'key' => $key]);

                } else {
                    return view('user.search', ['errors' => ["لا يوجد نتيجة"], 'key' => $key]);
                }
                }else{
                    if (Auth::check()) {
                    $fullName = Auth::user()->name;
                    $userName = explode(' ', $fullName)[0];
                    return view('user.search', ['userName' => $userName,'errors' => ["No Results Found"], 'key' => $key]);

                } else {
                    return view('user.search', ['errors' => ["No Results Found"], 'key' => $key]);
                }
                }
            }
        }else{
            if ($locale == 'ar') {
                return redirect()->back()->with("errors",["من فضلك ادخل بحث صالح "]);
            }else{
                return redirect()->back()->with("errors",["Please enter a valid search"]);
            }
        }

    }

    ///////////////////////END SEARCH///////////////////////////////////////////

    public function favorite(Request $request)
    {
        $locale = App::getLocale();
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $user_id = Auth::user()->id;
            $userName = explode(' ', $fullName)[0];

            $existingFavorite = Favorite::where('user_id', $user_id)
                ->where('pro_name', $request->input('pro_name'))
                ->where('pro_from', $request->input('pro_from'))
                ->first();
            if ($existingFavorite) {
                if ($locale == 'ar') {
                    return redirect()->back()->with(['userName' => $userName])->with("errors", ["المنتج موجود بالفعل فى المفضله"]);
                }else{
                    return redirect()->back()->with(['userName' => $userName])->with("errors", ["Product already in your Favorite"]);
                }
            }

            $product = new Favorite([
                'pro_name' => $request->input('pro_name'),
                'pro_from' => $request->input('pro_from'),
                'pro_price' => $request->input('pro_price'),
                'pro_image' => $request->input('pro_image'),
                'user_id' => $user_id
            ]);

            $product->save();
                if ($locale == 'ar') {
                    return back()->with(['userName' => $userName])->with("success", "تم أضافة المنتج فى المفضله بنجاح");
                }else{
                    return back()->with(['userName' => $userName])->with("success", "Product added to favorite");
                }
        } else {
            return view('auth.login');
        }
    }


    public function cart(Request $request)
    {
        $locale = App::getLocale();
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $user_id = Auth::user()->id;
            $userName = explode(' ', $fullName)[0];
            $quantity = $request->input('quantity', 1);
            // $pro_from = 'raneen';

            $existingCartItem = Cart::where('user_id', $user_id)
                ->where('pro_name', $request->input('pro_name'))
                ->where('pro_from', $request->input('pro_from'))
                ->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
                if ($locale == 'ar') {
                    return back()->with(['userName' => $userName])->with("success", "تم تحديث كمية المنتج في سلة التسوق بنجاح");
                }else{
                    return back()->with(['userName' => $userName])->with("success", "Product quantity updated in the Cart successfully");
                }
            }

            $product = new Cart([
                'pro_name' => $request->input('pro_name'),
                'pro_from' => $request->input('pro_from'),
                'pro_price' => $request->input('pro_price'),
                'pro_image' => $request->input('pro_image'),
                'user_id' => $user_id,
                'quantity' => $quantity
            ]);

            $product->save();
                if ($locale == 'ar') {
                    return back()->with(['userName' => $userName])->with("success", "تم اضافة المنتج لعربة التسوق بنجاح");
                }else{
                    return back()->with(['userName' => $userName])->with("success", "Product added to the Cart");
                }
        } else {
            return view('auth.login');
        }
    }



    public function getCartProducts($id)
    {
        $locale = App::getLocale();
        $key1 = "offers";
        $path ='C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key1 . '.json';
        $data = file_get_contents($path);
        $data = json_decode($data, true);
        $data= $this->normalizePrice($data);


        $product = Cart::findOrFail($id);
        $key=$product['pro_name'];
        $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
        $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
        $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';


        $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $data_jumia = $this->files($code_jumia, $path_jumia);
        $data_elaraby = $this->files($code_elaraby, $path_elaraby);
        $data_raneen = $this->files($code_raneen, $path_raneen);
        $data_jumia = $this->normalizePrice($data_jumia);
        $data_elaraby = $this->normalizePrice($data_elaraby);
        $data_raneen = $this->normalizePrice($data_raneen);
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            return view('user.favProduct', compact('userName','product','data','data_jumia','data_elaraby','data_raneen'));
        } else {
            return view('user.favProduct', compact('product','data','data_jumia','data_elaraby','data_raneen'));
        }
    }

    public function getFavProducts($id)
    {
        $key1 = "offers";
        $locale = App::getLocale();
        $path ='C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'.  $key1 . '.json';
        $data = file_get_contents($path);
        $data = json_decode($data, true);
        $product = Favorite::findOrFail($id);

        $key=$product['pro_name'];
        $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
        $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
        $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
        $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $data_raneen = $this->files($code_raneen, $path_raneen);
        $data_jumia = $this->files($code_jumia, $path_jumia);
        $data_elaraby = $this->files($code_elaraby, $path_elaraby);
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            return view('user.favProduct', compact('userName','product','data','data_jumia','data_elaraby','data_raneen'));
        } else {
            return view('user.favProduct', compact('product','data','data_jumia','data_elaraby','data_raneen'));
        }
    }

    public function product(Request $request)
    {
        $locale = App::getLocale();
        $key1=$request->input('search_key');
        $prod_name = $request->input('pro_name');
        $prod_price = $request->input('pro_price');
        $prod_image = $request->input('pro_image');
        $prod_link = $request->input('pro_link');
        $prod_from = $request->input('pro_from');
        //site prices
        $key=$prod_name;
        $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_'. $locale  .'_'. $key . '.json';
        $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale  .'_'.  $key . '.json';
        $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale  .'_'.  $key . '.json';
        $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_jumia ="scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
        $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";

        $data_raneen = $this->files($code_raneen, $path_raneen);
        $data_jumia = $this->files($code_jumia, $path_jumia);
        $data_elaraby = $this->files($code_elaraby, $path_elaraby);
        $data_raneen = $this->normalizePrice($data_raneen);
        $data_jumia = $this->normalizePrice($data_jumia);
        $data_elaraby = $this->normalizePrice($data_elaraby);
        $similar_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale  .'_'. $key1 . '.json';
        $similar_raneen_code = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key1\" -a lang=\"$locale\"";
        $similar=$this->files($similar_raneen_code,$similar_raneen);
        $similar= $this->normalizePrice($similar);
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $userName = explode(' ', $fullName)[0];
            return view('user.productsearch',['userName' => $userName,"prod_name"=>$prod_name,"prod_from"=>$prod_from,"prod_price"=>$prod_price,"prod_image"=>$prod_image,"prod_link"=>$prod_link,"data_raneen"=>$data_raneen,"data_jumia"=>$data_jumia,"data_elaraby"=>$data_elaraby,"similar"=>$similar,"key1"=>$key1]);
        } else {
            return view('user.productsearch',["prod_name"=>$prod_name,"prod_from"=>$prod_from,"prod_price"=>$prod_price,"prod_image"=>$prod_image,"prod_link"=>$prod_link,"data_raneen"=>$data_raneen,"data_jumia"=>$data_jumia,"data_elaraby"=>$data_elaraby,"similar"=>$similar,"key1"=>$key1]);
        }
    }


    public function goToCommunity(Request $request)
    {
        $locale = App::getLocale();
        if (Auth::check()) {
            $fullName = Auth::user()->name;
            $user_id = Auth::user()->id;
            $userName = explode(' ', $fullName)[0];
            $posts = Post::with('user')->latest()->get();
            $pro_link=$request->input('pro_link');
            return view('user.community', compact('posts'),['userName'=>$userName, 'pro_link'=>$pro_link]);
        } else {
            return view('auth.login');
        }
    }


}
