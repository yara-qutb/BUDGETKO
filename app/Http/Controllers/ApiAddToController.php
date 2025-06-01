<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Models\Cart;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiAddToController extends Controller
{
    public function addToCart(Request $request)
    {
        $pro_price=$request->input('pro_price');
        $pro_price=str_replace(',', '', $pro_price);
        // Validation rules for the incoming request
        $validator = Validator::make($request->all(), [
            'pro_name' => 'required|string|max:255',
            'pro_image' => 'required|url|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Set default quantity if not provided
        $quantity = $request->input('quantity', 1);  // Default value is 1
        $pro_from = 'raneen';

        // Check if the product already exists in the cart
        $existingCartItem = Cart::where('user_id', $request->input('user_id'))
            ->where('pro_name', $request->input('pro_name'))
            ->where('pro_from', $pro_from)
            ->first();

        if ($existingCartItem) {
            // If the product exists in the cart, increment the quantity
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();

            return response()->json(['message' => 'Product quantity updated in cart successfully', 'data' => $existingCartItem]);
        } else {
            // If the product does not exist in the cart, create a new cart entry
            $cart = new Cart();
            $cart->pro_name = $request->input('pro_name');
            $cart->pro_from = $pro_from;
            $cart->pro_price =$pro_price;
            $cart->pro_image = $request->input('pro_image');
            $cart->user_id = $request->input('user_id');
            $cart->quantity = $quantity;
            $cart->save();

            return response()->json(['message' => 'Product added to cart successfully', 'data' => $cart]);
        }
    }



    public function showCart(Request $request)
    {
        // Get the authenticated user's cart items
        $access_token = $request->header("access_token");
        $user = User::where("access_token", $access_token)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user_id = $user->id;
        $cartItems = Cart::where('user_id', $user_id)->get();

        // Count the number of items in the cart
        $itemsCount = $cartItems->count();

        // Calculate the total price of items in the cart
        $totalPrice = $cartItems->sum('pro_price');

        return response()->json([
            'data' => $cartItems,
            'items' => $itemsCount,
            'total_price' => $totalPrice,
        ]);
    }




    public function addToFav(Request $request)
    {
        $pro_price=$request->input('pro_price');
        $pro_price=str_replace(',', '', $pro_price);
        // Validation rules for the incoming request
        $validator = Validator::make($request->all(), [
            'pro_name' => 'required|string|max:255',
            'pro_image' => 'required|url|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $pro_from = 'ranenn';


        $user_id = $request->input('user_id');
        // Check if the product already exists in the favorites
        $existingFavorite = Favorite::where('user_id', $user_id)
            ->where('pro_name', $request->input('pro_name'))
            ->where('pro_from', $pro_from)
            ->first();

        if ($existingFavorite) {
            return response()->json(['message' => 'Product already exists in the favorite']);
        } else {
            // Create a new fav instance and save it to the database
            $favorite = new Favorite();
            $favorite->pro_name = $request->input('pro_name');
            $favorite->pro_from = $pro_from;
            $favorite->pro_price = $pro_price;
            $favorite->pro_image = $request->input('pro_image');
            $favorite->user_id = $request->input('user_id');
            $favorite->save();

            return response()->json(['message' => 'Product added to favorite successfully', 'data' => $favorite]);
        }
    }

    public function showFav(Request $request)
    {
        // Get the authenticated user's fav items
        $access_token = $request->header("access_token");
        $user = User::where("access_token", $access_token)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user_id = $user->id;
        $favItems = Favorite::where('user_id', $user_id)->get();

        // Count the number of items in the favorites
        $itemsCount = $favItems->count();

        return response()->json([
            'data' => $favItems,
            'items' => $itemsCount,
        ]);
    }


    public function removeFromCart($id)
    {
        $cart = Cart::find($id);

        if ($cart) {
            $cart->delete();
            return response()->json(['message' => 'Cart item deleted successfully']);
        } else {
            return response()->json(['message' => 'Cart item not found'], 404);
        }
    }

    public function clearCart(Request $request)
    {
        $access_token = $request->header("access_token");
        $user = User::where("access_token", $access_token)->first();
        $user_id = $user->id;

        Cart::where('user_id', $user_id)->delete();
        return response()->json(['message' => 'All items deleted from the cart']);
    }

    public function removeFromFav($id)
    {
        $favorite = Favorite::find($id);

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Favorite item deleted successfully']);
        } else {
            return response()->json(['message' => 'Favorite item not found'], 404);
        }
    }



    public function clearFav(Request $request)
    {
        $access_token = $request->header("access_token");
        $user = User::where("access_token", $access_token)->first();
        $user_id = $user->id;

        Favorite::where('user_id', $user_id)->delete();

        return response()->json(['message' => 'All items deleted from the favorite']);
    }


    public function files($code, $path)
    {
        if (file_exists($path)) {
            $var = file_get_contents($path);
            return json_decode($var, true);
        } else {
            shell_exec($code);
            if (file_exists($path)) {
                $var = file_get_contents($path);
                return json_decode($var, true);
            }
        }
        return [];
    }


    public function search(Request $request)
    {
        $locale="en";
        $key = $request->input('key');

        if ($key != null) {
            $path_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale . '_' . $key . '.json';
            $path_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale . '_' . $key . '.json';
            $path_elaraby = 'C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale . '_' . $key . '.json';

            $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
            $code_jumia = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
            $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";

            $data_raneen = $this->files($code_raneen, $path_raneen);
            $data_jumia = $this->files($code_jumia, $path_jumia);
            $data_elaraby = $this->files($code_elaraby, $path_elaraby);

            $results = [
                'raneen' => $data_raneen,
                'jumia' => $data_jumia,
                'elaraby' => $data_elaraby,
                'key' => $key,
            ];

            if (!empty($data_raneen['products']) || !empty($data_jumia['products']) || !empty($data_elaraby['products'])) {
                return response()->json(['success' => true, 'data' => $results]);
            } else {
                return response()->json(['success' => false, 'message' => 'No Results Found']);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Please enter a valid search']);
        }
    }

    public function filess($code, $path)
    {
        if (file_exists($path)) {
            $var = file_get_contents($path);
            $data = json_decode($var, true);
            $data = $this->normalizePrice($data);
        } else {
            $search = shell_exec($code);
            if (file_exists($path)) {
                $var = file_get_contents($path);
                $data = json_decode($var, true);
                $data = $this->normalizePrice($data);

            } else {
                $data = null;
            }
        }

        return $data;
    }
    private function normalizePrice($data)
{
    if (isset($data['products'])) {
        foreach ($data['products'] as &$item) {
            if (isset($item['price'])) {
                // Remove commas from the price
                $item['price'] = str_replace(',', '', $item['price']);
            }
        }
    }
    return $data;
}


    public function budget(Request $request)
    {
        $locale ="en";
        $key_counter = 0;
        $budget_counter = 0;
        $products_data = [];
        $main_budget = $request->input('main_budget');
        $total_budget_entered = 0;

        if (!$request->filled('main_budget')) {
            return response()->json(['error' => 'Please enter the main budget'], 400);
        }

        for ($i = 1; $i <= 5; $i++) {
            if ($request->filled('key' . $i)) {
                $key = $request->input('key' . $i);
                if ($request->filled('budget' . $i)) {
                    $budget = $request->input('budget' . $i);
                    $total_budget_entered += $budget;
                    $budget_counter++;
                } else {
                    $budget = null;
                }

                $filename_raneen = 'C:\xampp\htdocs\Budgetko\public\asset\json\raneen_' . $locale . '_' . $key . '.json';
                $filename_jumia = 'C:\xampp\htdocs\Budgetko\public\asset\json\jumia_' . $locale . '_' . $key . '.json';
                $filename_elaraby ='C:\xampp\htdocs\Budgetko\public\asset\json\elaraby_' . $locale . '_' . $key . '.json';

                $code_raneen = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\raneen.py -a keyword=\"$key\" -a lang=\"$locale\"";
                $code_jumia = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\jumia.py -a keyword=\"$key\" -a lang=\"$locale\"";
                $code_elaraby = "scrapy runspider C:\\xampp\\htdocs\\Budgetko\\public\\asset\\python\\scraper\\spiders\\elaraby.py -a keyword=\"$key\" -a lang=\"$locale\"";


                $products_data[$i] = [
                    'key' => $key,
                    'budget' => $budget,
                    'jumia' => $this->filess($code_jumia, $filename_jumia),
                    'raneen' => $this->filess($code_raneen, $filename_raneen),
                    'elaraby' => $this->filess($code_elaraby, $filename_elaraby),
                ];

                $key_counter++;
            }
        }

        if ($key_counter == 0) {
            return response()->json(['error' => 'Please enter at least one item.'], 400);
        }

        if ($budget_counter < $key_counter - 1) {
            return response()->json(['error' => 'You must enter budgets for at least ' . ($key_counter - 1) . ' items.'], 400);
        }

        if ($budget_counter == $key_counter - 1) {
            $missing_budget = $main_budget - $total_budget_entered;
            if ($missing_budget <= 0) {
                return response()->json(['error' => 'The total of entered budgets exceeds the main budget.'], 400);
            }

            for ($i = 1; $i <= $key_counter; $i++) {
                if (is_null($products_data[$i]['budget'])) {
                    $products_data[$i]['budget'] = $missing_budget;
                    break;
                }
            }
        }

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

        $counts = array_map('count', $search_products);
        $count = min($counts);

        return response()->json(['search_products' => $search_products, 'count' => $count]);
    }
}
