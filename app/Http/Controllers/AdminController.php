<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
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

            'name' => 'required|max:50|unique:admins,name',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ],);

        if($validator->fails()){

            return redirect()->route('admin.admin_register')->withInput()->withErrors($validator);
        }

        $admin = new Admin;

        $admin->name =$request->input('name');
        $admin->email =$request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        return redirect()->route('admin.admin_login')->with('success', 'You have registered successfully!');
    }


//admin_loginページに関する記述

    public function admin_login(){

        return view('admin.admin_login');
        
    }

    public function authenticate(Request $request){
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50|',
            'password' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->route('admin.admin_login')->withInput()->withErrors($validator);
        }

    

        if(Auth::guard('admin')->attempt(['name' => $request->input('name'), 'password' => $request->input('password')])){

            $admin = Auth::guard('admin')->user();

            if($admin->role == 'admin'){

                return redirect()->route('admin.dashboard');

            }else{

                Auth::logout();

                return redirect()->route('user.login');
            }


        }else{

            return redirect()->route('admin.admin_login')->with('error', 'Name or password is incorect!');
        }

        
    }



//dashboardページに関する記述

    public function dashboard(Order $order){

        $user_account_total = User::all()->count();

        $admin_account_total = Admin::all()->count();
        
        $products_total = Product::all()->count();

        $total_messages = Message::all()->count();

        $all_orders = Order::all();

        $total_orders = $all_orders->pluck('total_price')->sum();


        $total_complete = Order::where('status', 'completed')->sum('total_price');

        $total_pending = Order::where('status', 'pending')->sum('total_price');


        return view('admin.dashboard', compact('user_account_total',
        'admin_account_total', 'products_total', 'total_messages', 'total_orders', 'total_complete', 'total_pending'));
    }


//admin_accountsページに関する記述

    public function admin_accounts(){

        $admins = Admin::orderBy('created_at', 'ASC')->paginate(10);

        return view('admin.admin_accounts', compact('admins'));
    }


    public function admin_accounts_destroy(Admin $admin){
        
        $admin->delete();

        session()->flash('success', 'Account deleted successfully!');

        return response()->json([

            'status' => true,
        ]);

    }


//placed_ordersページに関する記述

    public function placed_orders(Request $request){

 
    
        $orders = Order::orderBy('created_at', 'ASC')->paginate(6); 
    
        return view('admin.placed_orders', compact('orders'));
    }


    public function placed_orders_destroy(Order $order){

        $order->delete();

        session()->flash('success', 'This order deleted sccessfully!');

        return response()->json([

            'status' => true,
        ]);
    }


    public function placed_orders_update(Request $request, Order $order){

        $validator = Validator::make($request->all(), [

            'status' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }


//Completed_ordersページに関する記述

    public function completed_orders(){

        $orders = Order::where('status', 'completed')->orderBy('created_at', 'ASC')->paginate(1);

        return view('admin.completed_orders', compact('orders'));
    }

    
    public function completed_orders_destroy(Order $order){

        $order->delete();

        session()->flash('success', 'This order deleted sccessfully!');

        return response()->json([

            'status' => true,
        ]);
    }


    public function completed_orders_update(Request $request, Order $order){

        
        $validator = Validator::make($request->all(), [

            'status' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

//pending_ordersページに関する記述

    public function pending_orders(){

        $orders = Order::where('status', 'pending')->orderBy('created_at', 'ASC')->paginate(1);

        return view('admin.pending_orders', compact('orders'));
    }

    
    public function pending_orders_destroy(Order $order){

        $order->delete();

        session()->flash('success', 'This order deleted sccessfully!');

        return response()->json([

            'status' => true,
        ]);
    }


    public function pending_orders_update(Request $request, Order $order){

        
        $validator = Validator::make($request->all(), [

            'status' => 'required',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }





//messagesページに関する記述

    public function messages(){

        $messages = Message::orderBy('created_at', 'ASC')->paginate(6);

        return view('admin.messages', compact('messages'));
    }


    public function messages_destroy(Message $message){

        $message->delete();

        session()->flash('success', 'Message deleted successfully!');

        return response()->json([

            'status' => true
        ]);

    }



//productsページに関する記述

    public function products(){

        $categories = Category::all();

        $products = Product::orderBy('created_at', 'ASC')->with('category')->paginate(6);

        return view('admin.products', compact('categories', 'products'));
    }


    public function products_store(Request $request){

        $validator = Validator::make($request->all(), [

            'name' => 'required|max:50|unique:products,name',
            'category_id' => 'required',
            'price'  => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,webp,png',
        ]);

        if($validator->fails()){

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $product = new Product;

        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');

        if(!empty($request->file('image'))){

           $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move(public_path('uploaded_img/'), $imageName);
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->back()->with('success', 'Product added successfully!');

    }


    public function products_destroy(Product $product){

        $product->delete();

        $old_image = public_path('uploaded_img/'. $product->image);

        if(is_file($old_image)){
            unlink($old_image);
        }

        session()->flash('success', 'Product deleted successfully!');

        return response()->json([
            'status' => true,
        ]);


    }

    
//update_productページに関する記述

    public function product_edit(Product $product){

        $categories = Category::all();

        return view('admin.update_product', compact('product', 'categories'));
    }


    public function product_update(Request $request, Product $product){

        $validator = Validator::make($request->all(), [

            'name' => 'nullable|max:50|unique:products,name,'. $product->id,
            'category_id' => 'nullable',
            'price'  => 'nullable|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,webp,png',
        ]);

        if($validator->fails()){

            return redirect()->route('admin.product_edit', $product->id)->withInput()->withErrors($validator);
        }

        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = str_replace(',' ,'', $request->input('price'));
        $product->save();

        if(!empty($request->file('image'))){

            $old_image = public_path('uploaded_img/'. $product->image);

            if(is_file($old_image)){
                unlink($old_image);
            }

            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time(). '.'. $ext;
            $image->move(public_path('uploaded_img/'), $imageName);
            $product->image = $imageName;
            $product->save();
        }

        return redirect()->route('admin.product_edit', $product->id)->with('success', 'Product updated successfully!');


    }



//update_profileページに関する記述

    public function profile_edit(Admin $admin){

 
        return view('admin.update_profile', compact('admin'));
    }



    public function profile_update(Request $request, Admin $admin){

        $validator = Validator::make($request->all(), [

            'name' => 'required|unique:admins,name,'. $admin->id,
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:3',
            'new_password_confirmation' => 'required',
        ],);

        if($validator->fails()){

            return redirect()->route('admin.profile_edit', $admin->id)->withInput()->withErrors($validator);
        }

        $old_pass = $request->input('old_password');

        if(!Hash::check($old_pass, $admin->password)){

            return redirect()->route('admin.profile_edit', $admin->id)->with('error', 'Old password incorrect!');
        }

        $admin->name = $request->input('name');
        $admin->password = Hash::make($request->input('new_password'));
        $admin->save();

        return redirect()->route('admin.profile_edit', $admin->id)->with('success', 'Profile updated successfully!');

    }


//user_accountsページに関する記述

    public function user_accounts(){
        
        $users = User::orderBy('created_at', 'ASC')->paginate(10);


        return view('admin.user_accounts', compact('users'));
    }


    public function user_accounts_destroy(User $user){

        $user->delete();

        session()->flash('success', 'Account deleted successfully!');


        return response()->json([
            'status' => true,
        ]);

    }


//logout処理に関する記述    

    public function logout(Request $request){

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.admin_login');

    }

}
