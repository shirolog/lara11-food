<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{   

// registerページに関する記述

  public function register(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('register', compact('cart_total'));

  }

  public function store(Request $request){

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'number' => 'required|numeric|digits:10|unique:users,number',
        'password' => 'required|confirmed|min:3',
        'password_confirmation' => 'required',
    ],);

    if($validator->fails()){

        return redirect()->route('user.register')->withInput()->withErrors($validator);
    }

    $user = new User;

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->number = $request->input('number');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    return redirect()->route('user.login')->with('success', 'You have registered successfully!');

  }



//loginページに関する記述

  public function login(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('login', compact('cart_total'));
  }


  public function authenticate(Request $request){

    $validator = Validator::make($request->all(), [
      'email' => 'required|email|max:50|',
      'password' => 'required|max:50',
    ],);

    if($validator->fails()){

      return redirect()->route('user.login')->withInput()->withErrors($validator);
    }

    if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

      return redirect()->route('user.home');

    }else{
        
        return redirect()->route('user.login')->with('error', 'Email or password is incorrect!');
    }


  }


//homeページに関する記述

  public function home(){

    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    $products = Product::orderBy('created_at', 'ASC')->with('category')->paginate(6);



    return view('home', compact('cart_total', 'products'));
  }


 
  


//aboutページに関する記述

  public function about(){

    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('about', compact('cart_total'));
  }



//menuページに関する記述

  public function menu(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    $products = Product::orderBy('created_at', 'ASC')->with('category')->paginate(12);

    return view('menu', compact('cart_total', 'products'));
  }



//ordersページに関する記述

  public function orders(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'ASC')->get();

    return view('orders', compact('cart_total', 'orders'));
  }




//contactページに関する記述

  public function contact(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('contact', compact('cart_total'));
  }


  public function contact_store(Request $request){
      
      $validator = Validator::make($request->all(), [

        'name' => 'required|max:50',
        'number' => 'required|numeric|max:50',
        'email' => 'required|email|max:50',
        'message' => 'required|max:500',
      ]);

      $message = new Message;

      $message->user_id = Auth::user()->id;
      $message->name = $request->input('name');
      $message->email = $request->input('email');
      $message->number = $request->input('number');
      $message->message = $request->input('message');
      $message->save();

      return redirect()->route('user.contact')->with('success', 'Message send successfully!');

  }




//searchページに関する記述

  public function search(Request $request){
    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    $search_box =  $request->input('search_box');

    if(!empty($search_box)){

      $products = Product::where('name', 'like', '%'.$search_box.'%')->paginate(6)->appends(['search_box' => $search_box]);

    }else{
      $products = collect();
    }


    return view('search', compact('cart_total', 'products'));
  }




//quick_viewページに関する記述

  public function quick_view(Product $product){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('quick_view', compact('cart_total', 'product'));
  }



  //add_cart処理に関する記述
  public function add_cart(Request $request){

    $validator = Validator::make($request->all(), [

        'pid' => 'required',
        'name' => 'required',
        'price' => 'required',
        'quantity' => 'required|min:1|max:99',
        'image' => 'required',
        'category_id' => 'required',
    ]);

    if($validator->fails()){

      return redirect()->back()->withInput()->withErrors($validator);
    }

    

    $cart = new Cart;

    $cart->user_id = Auth::user()->id;
    $cart->pid = $request->input('pid');
    $cart->name = $request->input('name');
    $cart->price = $request->input('price');
    $cart->quantity = $request->input('quantity');
    $cart->image = $request->input('image');
    $cart->category_id = $request->input('category_id');
    $cart->save();


    return redirect()->back()->with('success', 'Cart added successfully!');
  }



//cartページに関する記述

  public function cart(){

    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
  } else {
      $cart_total = 0;
  }
  
  $allCarts = Cart::where('user_id', Auth::user()->id)->get(); 
  
  $total_cart_value = $allCarts->sum(function ($cart) {
      return $cart->price * $cart->quantity;
  });
  
  $carts = Cart::where('user_id', Auth::user()->id)
      ->with('product')
      ->orderBy('created_at', 'ASC')
      ->paginate(6);
  
  return view('cart', compact('cart_total', 'carts', 'total_cart_value'));
  }


  public function cart_destroy(Cart $cart){

    $cart->delete();

    session()->flash('success', 'This product deleted from cart!');

     return response()->json([
        
        'status' => true
     ]);
  }

  public function cart_all__destroy(){

    Cart::where('user_id', Auth::user()->id)->delete();

    session()->flash('success', 'All products have deleted from your cart.');

    return redirect()->route('user.cart');
  }


  public function cart_update(Request $request, Cart $cart){

      $validator = Validator::make($request->all(),[

          'pid' => 'required',
          'name' => 'required',
          'price' => 'required',
          'quantity' => 'required',
          'image' => 'required',
          'category_id' => 'required',
      ]);

      if($validator->fails()){

        return redirect()->back()->withInput()->withErrors($validator);

      }

      $cart->user_id = Auth::user()->id;
      $cart->pid = $request->input('pid');
      $cart->name = $request->input('name');
      $cart->price = $request->input('price');
      $cart->image = $request->input('image');
      $cart->quantity = $request->input('quantity');
      $cart->category_id = $request->input('category_id');
      $cart->save();

      return redirect()->back()->with('success', 'Product quantity updated successfully!');
  }


//cart_categoryページに関する記述
    
  public function cart_category(Category $category){


    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    $carts = Cart::where('user_id', Auth::user()->id)
    ->where('category_id', $category->id)
    ->with('product')->orderBy('created_at', 'ASC')
    ->paginate(6);


    return view('cart_category', compact('cart_total', 'carts'));
  }

  
//cart_viewページに関する記述
  
  public function cart_view(Cart $cart){

    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('cart_view', compact('cart_total', 'cart'));
  }




//categoryページに関する記述

  public function category(Category $category){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    $products = Product::where('category_id', $category->id)->paginate(10);
    

    return view('category', compact('cart_total', 'products'));
  }




//profileページに関する記述

  public function profile(User $user){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('profile', compact('cart_total', 'user'));
  }

  

//update_profileページに関する記述

  public function profile_edit(User $user){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('update_profile', compact('cart_total', 'user'));
  }


  public function profile_update(Request $request, User $user){

    $validator = Validator::make($request->all(),[

      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $user->id,
      'old_password' => 'required',
      'new_password' => 'required|confirmed|min:3',
      'new_password_confirmation' => 'required',
        
    ],);

    if($validator->fails()){

      return  redirect()->route('user.profile_edit', $user->id)->withInput()->withErrors($validator);
    
    }

    $old_pass = $request->input('old_password');

    if(!Hash::check($old_pass, $user->password)){

      return  redirect()->route('user.profile_edit', $user->id)->with('error', 'Old password incorrect!');
    }

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('new_password'));
    $user->save();

    
    return  redirect()->route('user.profile', $user->id)->with('success', 'Profile updated successfully!');
  }






//update_addressページに関する記述

  public function address_edit(User $user){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('update_address', compact('cart_total'), compact('user'));
  }


  public function address_update(Request $request, User $user){

    $validator = Validator::make($request->all(),[

      'flat' => 'required|max:50',
      'street' => 'required|max:50',
      'city' => 'required|max:50',
      'state' => 'required|max:50',
      'country' => 'required|max:50',
      'pin_code' => 'required|numeric',    
      ]);

      if($validator->fails()){

        return redirect()->route('user.address_edit', $user->id)->withInput()->withErrors($validator);

      }

      $flat = $request->input('flat');
      $street = $request->input('street');
      $city = $request->input('city');
      $state = $request->input('state');
      $country = $request->input('country');
      $pinCode = $request->input('pin_code');

      $address = $flat . ', ' . $street . ', ' . $city . ', ' . $state . ', ' . $country . ' - ' . $pinCode;

      $user->address = $address;
      $user->save();

      return redirect()->route('user.profile', $user->id)->with('success', 'Address updated successfully!');
  }
  



//checkoutページに関する記述

  public function checkout(Cart $cart){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    $carts = Cart::where('user_id', Auth::user()->id)->orderBy('created_at')->get();

    $total_cart_value = $carts->sum(function($cart){
      return $cart->price * $cart->quantity;
    });

    return view('checkout', compact('cart_total', 'carts', 'total_cart_value'));
  }

  public function add_order(Request $request){

    $validator = Validator::make($request->all(), [

      'method' => 'required',
      'product.*' => 'required|string',
      'quantity.*' => 'required|integer',
      'total_price' => 'required',
    ]);

    if($validator->fails()){

      return redirect()->back()->withInput()->withErrors($validator);

    }

    $productNames = $request->input('product');
    $quantities = $request->input('quantity');
    $total_products = [];

    foreach($productNames as $index => $productName){

      $quantity = $quantities[$index];
      $total_products[] = "{$productName} ({$quantity})";
    }

    $total_products_string = implode('-', $total_products);

    $order = new Order;

    $order->user_id = Auth::user()->id;
    $order->name = Auth::user()->name;
    $order->number = Auth::user()->number;
    $order->email = Auth::user()->email;
    $order->address = Auth::user()->address;
    $order->method = $request->input('method');
    $order->total_price = str_replace(',', '', $request->input('total_price'));;
    $order->placed_on = date('Y-m-d');
    $order->total_products = $total_products_string;
    $order->save();
    
    Cart::where('user_id', Auth::user()->id)->delete();


    return redirect()->route('user.orders')->with('success', 'Order placed successfully!');

  }



//logoutに関する記述
  public function logout(Request $request){

  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect()->route('user.login');

  }


}
