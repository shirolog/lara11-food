<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        'name' => 'required|max:50',
        'email' => 'required|email|unique:users,email',
        'number' => 'nullable|numeric|digits:10|unique:users,number',
        'password' => 'required|confirmed|min:3',
        'password_confirmation' => 'required',
    ],[
        'email.unique' => 'email or number is already taken!',
        'number.unique' => 'email or number is already taken!',
        'number.digits' => 'The number must be exactly 10 digits.',
        'password.confirmed' => 'confirm password not matched!',
    ]);

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
      'email' => 'required|email|max:50',
      'password' => 'required|max:50',
    ]);

    if($validator->fails()){

      return redirect()->route('user.login')->withInput()->withErrors($validator);
    }

    if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){

      return redirect()->route('user.home');

    }else{
        
        return redirect()->route('user.login')->with('error', 'email or password is incorrect!');
    }


  }


//homeページに関する記述

  public function home(){

    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('home', compact('cart_total'));
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


    return view('menu', compact('cart_total'));
  }



//ordersページに関する記述

  public function orders(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('orders', compact('cart_total'));
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




//searchページに関する記述

  public function search(){
    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('search', compact('cart_total'));
  }




//cartページに関する記述

  public function cart(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('cart', compact('cart_total'));
  }




//profileページに関する記述

  public function profile(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('profile', compact('cart_total'));
  }





//update_profileページに関する記述

  public function update_profile(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('update_profile', compact('cart_total'));
  }





//update_addressページに関する記述

  public function update_address(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('update_address', compact('cart_total'));
  }



  



//checkoutページに関する記述

  public function checkout(){

    
    if (Auth::check()) {
      $cart_total = Cart::where('user_id', Auth::user()->id)->count();
    } else {
        $cart_total = 0;
    }

    return view('checkout', compact('cart_total'));
  }


//logoutに関する記述
  public function logout(Request $request){

  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect()->route('user.login');

  }


}
