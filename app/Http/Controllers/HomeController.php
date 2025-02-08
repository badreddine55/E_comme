<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;

use App\Mail\MailableOrder;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    //
    public function index(Request $request){
  
       
        $products= Product::all();
        $keyword = $request->input("search");
        if(empty($request->input("search"))){
            $categories = Category::all();
        }else{
            $categories =  Category::whereHas('products', function ($query) use($keyword) {
                $query->where('name', 'like', '%'.$keyword.'%');
            })->get();
        }
        
        
       // get all product from session 
       $selectedProductsIDs =json_decode($request->session()->get('cart', '[]'));
       $selectedProducts = Product::whereIn('id', $selectedProductsIDs)->get();
        return view("home.index",[
            "products"=>$products ,
            "categories"=>$categories,
            "selectedProductsIDs"=>$selectedProductsIDs,
            "selectedProducts"=>$selectedProducts
         ]);
    }
    
    public function addToCart(Request $request,$id){
        $oldListOfProducts =$request->session()->get('cart', '[]');

        $listOfProducts = json_decode($oldListOfProducts);
        array_push($listOfProducts, $id);
        $request->session()->put('cart', json_encode($listOfProducts));
        return redirect()->route("home.index");
    }
    public function checkout(Request $request){
        $selectedProductsIDs =json_decode($request->session()->get('cart', '[]'));
        // creation de la commande
        $newOrder = new Order();
        $newOrder->no = 10;
        $newOrder->amount = 250.0;
        $newOrder->status = "pending";
        $newOrder->save();
        foreach($selectedProductsIDs as $productID){
            $cart = new Cart();
            $cart->user_id = 1;
            $cart->product_id= $productID;
            $cart->order_id =$newOrder->id;
            $cart->save();
        }
        $request->session()->forget('cart');
        // change this eail with the email of authenticated user
        Mail::to('wladderb22@gmail.com')->send(new MailableOrder("Sami",$newOrder->amount ,count($selectedProductsIDs) ));
        return redirect()->route("home.index");
    }
}

