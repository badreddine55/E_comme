<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use App\Mail\MailableOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        $products = Product::all();

        $keyword = $request->input("search");
        if (empty($request->input("search"))) {
            $categories = Category::all();
        } else {
            $categories = Category::whereHas('products', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })->get();
        }

        // Get all product IDs from session
        $selectedProductsIDs = json_decode($request->session()->get('cart', '[]'));
        $selectedProducts = Product::whereIn('id', $selectedProductsIDs)->get();

        return view("home.index", [
            "users" => $users,
            "products" => $products,
            "categories" => $categories,
            "selectedProductsIDs" => $selectedProductsIDs,
            "selectedProducts" => $selectedProducts
        ]);
    }

    public function addToCart(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:products,id'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $oldListOfProducts = $request->session()->get('cart', '[]');
        $listOfProducts = json_decode($oldListOfProducts);
        array_push($listOfProducts, $id);
        $request->session()->put('cart', json_encode($listOfProducts));

        return redirect()->route("home.index")->with('success', 'Product added to cart successfully.');
    }

    public function checkout(Request $request)
    {
        $selectedProductsIDs = json_decode($request->session()->get('cart', '[]'));

        if (empty($selectedProductsIDs)) {
            return back()->with('error', 'Your cart is empty.');
        }

        $validator = Validator::make(['selectedProductsIDs' => $selectedProductsIDs], [
            'selectedProductsIDs' => 'required|array',
            'selectedProductsIDs.*' => 'exists:products,id'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        // Create a new order
        $newOrder = new Order();
        $newOrder->no = Order::max('no') + 1; // Increment order number
        $newOrder->amount = 250.0; // Calculate the total amount dynamically
        $newOrder->status = "pending";
        $newOrder->user_id = 1; // Assuming the user is authenticated and has an ID of 1
        $newOrder->save();

        foreach ($selectedProductsIDs as $productID) {
            $cart = new Cart();
            $cart->user_id = 1; // Assuming the user is authenticated and has an ID of 1
            $cart->product_id = $productID;
            $cart->order_id = $newOrder->id;
            $cart->save();
        }

        $request->session()->forget('cart');

        // Send email notification
        Mail::to('beddine330@gmail.com')->send(new MailableOrder("Sami", $newOrder->amount, count($selectedProductsIDs)));

        return redirect()->route("home.index")->with('success', 'Order placed successfully.');
    }
}