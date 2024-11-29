<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{   


// admin_registerページに関する記述

    public function admin_register(){

        return view('admin.admin_register');
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(), [

            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ],[
            'email.unique' => 'email is already taken!',
            'password.confirmed' => 'confirm password not matched!',
        ]);

        if($validator->fails()){

            return redirect()->route('admin.admin_register')->withInput()->withErrors($validator);
        }

        $user = new User;

        $user->name =$request->input('name');
        $user->email =$request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('admin.admin_login')->with('success', 'You have registered successfully!');
    }


//admin_loginページに関する記述

    public function admin_login(){

        return view('admin.admin_login');
    }

    public function authenticate(Request $request){
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'password' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->route('admin.admin_login')->withInput()->withErrors($validator);
        }

    

        if(Auth::attempt(['name' => $request->input('name'), 'password' => $request->input('password')])){

            $user = Auth::user();

            if($user->role == 'admin'){

                return redirect()->route('admin.dashboard');

            }else{

                Auth::logout();

                return redirect()->route('user.login');
            }


        }else{

            return redirect()->route('admin.admin_login')->with('error', 'name or password is incorect!');
        }

        
    }



//dashboardページに関する記述

    public function dashboard(){

        return view('admin.dashboard');
    }


//admin_accountsページに関する記述

    public function admin_accounts(){

        return view('admin.admin_accounts');
    }


//placed_ordersページに関する記述

    public function placed_orders(){

        return view('admin.placed_orders');
    }


//messagesページに関する記述

    public function messages(){

        return view('admin.messages');
    }


//productsページに関する記述

    public function products(){

        return view('admin.products');
    }

    
//update_productページに関する記述

    public function update_product(){

        return view('admin.update_product');
    }


//update_profileページに関する記述

    public function update_profile(){

        return view('admin.update_profile');
    }


//user_accountsページに関する記述

    public function user_accounts(){

        return view('admin.user_accounts');
    }


//logout処理に関する記述    

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.admin_login');

    }

}
