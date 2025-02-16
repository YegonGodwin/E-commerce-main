<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product_table;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use Session;

use Stripe;

use Illuminate\SUpport\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = User::where('usertype', 'user')-> get() -> count();

        $product = Product_table::all() -> count();

        $order = Order::all() -> count();

        $delivered = Order::where('status', 'Delivered') ->get() -> count();

        return view('admin.index', compact('user', 'product', 'delivered', 'order'));
    }
    public function home(){

        $product = Product_table::all();

        if(Auth::id()){
            
            $user = Auth::user();

            $userid =$user -> id;
    
            $count = Cart::where('user_id', $userid) -> count();
        }
        else{
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }
    public function login_home(){
        $product = Product_table::all();

        if(Auth::id()){
            
            $user = Auth::user();

            $userid =$user -> id;
    
            $count = Cart::where('user_id', $userid) -> count();
        }
        else{
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }
    public function product_details($id){

        $data = Product_table::find($id);

        if(Auth::id()){
            
            $user = Auth::user();

            $userid =$user -> id;
    
            $count = Cart::where('user_id', $userid) -> count();
        }
        else{
            $count = '';
        }

        return view('home.product_details', compact('data', 'count'));
    }
    public function add_cart($id){

        $product_id = $id;

        $user = Auth::user();

        $user_id = $user -> id;

        $data = new Cart;

        $data -> user_id = $user_id;

        $data -> product_id = $product_id;

        $data -> save();

        toastr() -> timeOut(10000)-> closeButton() -> addInfo('Product Added to the Cart successfully!');

        return redirect() -> back();

    }
    public function my_cart(){
        
        if(Auth::id()){
            
            $user = Auth::user();

            $userId = $user -> id;

            $count = Cart::where('user_id', $userId) -> count();

            $cart = Cart::where('user_id', $userId) -> get();

        }

        return view('home.my_cart', compact('count', 'cart'));

    }
    public function delete_cart($id){

        $myCart = Cart::find($id);

        $myCart -> delete();

        toastr() -> timeOut(10000) -> closeButton() -> addWarning('Cart Was Removed');

        return redirect()-> back();
    }
    public function confirm_order(Request $request){
        
        $name = $request -> name;

        $address = $request -> address;

        $phone = $request -> phone;
        
        $userid = Auth::user() -> id;

        $cart = Cart::where('user_id', $userid) -> get();

        foreach($cart as $carts){
            $order = new Order;

            $order -> name = $name;

            $order -> rec_address = $address;

            $order -> phone_number = $phone;

            $order -> user_id = $userid;

            $order -> product_id = $carts -> product_id;

            $order -> save();

        }
        $cart_remove = Cart::where('user_id',$userid) -> get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove -> id);

            $data -> delete();
        }
        toastr() -> timeOut(10000) -> closeButton() -> addInfo('Product Ordered successfully!!');
        return redirect() -> back();
    }
    public function my_orders(){

        $user = Auth::user() -> id;

        $count = Cart::where('user_id', $user) -> get() -> count();

        $order = Order::where('user_id', $user) -> get();

        return view('home.Order', compact('count', 'order'));
    }
    public function stripe($value)

    {

        return view('home.stripe', compact('value'));

    }
    public function stripePost(Request $request, $value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment completed successful" 

        ]);

      

        $name = Auth::user() -> name;

        $address = Auth::user() -> address;

        $phone = Auth::user() -> phone;
        
        $userid = Auth::user() -> id;

        $cart = Cart::where('user_id', $userid) -> get();

        foreach($cart as $carts){
            $order = new Order;

            $order -> name = $name;

            $order -> rec_address = $address;

            $order -> phone_number = $phone;

            $order -> user_id = $userid;

            $order -> product_id = $carts -> product_id;

            $order -> payment_status = "paid";

            $order -> save();

        }
        $cart_remove = Cart::where('user_id',$userid) -> get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove -> id);

            $data -> delete();
        }
        toastr() -> timeOut(10000) -> closeButton() -> addInfo('Product Ordered successfully!!');
        return redirect('my_cart');

    }
    public function shop(){

        $product = Product_table::all();

        if(Auth::id()){
            
            $user = Auth::user();

            $userid =$user -> id;
    
            $count = Cart::where('user_id', $userid) -> count();
        }
        else{
            $count = '';
        }

        return view('home.shop', compact('product', 'count'));
    }
    public function why(){

        $product = Product_table::all();

        if(Auth::id()){
            
            $user = Auth::user();

            $userid =$user -> id;
    
            $count = Cart::where('user_id', $userid) -> count();
        }
        else{
            $count = '';
        }

        return view('home.why', compact('product', 'count'));
    }
    public function testimonial(){

        $product = Product_table::all();

        if(Auth::id()){
            
            $user = Auth::user();

            $userid =$user -> id;
    
            $count = Cart::where('user_id', $userid) -> count();
        }
        else{
            $count = '';
        }

        return view('home.testimonial', compact('product', 'count'));
    }
    public function contact(){

        $product = Product_table::all();

        if(Auth::id()){
            
            $user = Auth::user();

            $userid =$user -> id;
    
            $count = Cart::where('user_id', $userid) -> count();
        }
        else{
            $count = '';
        }

        return view('home.contact', compact('product', 'count'));
    }
    

}
