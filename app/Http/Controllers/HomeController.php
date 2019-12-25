<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Polyfill\Ctype\Ctype;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //$this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect()->route('AdminHome');
    }
    public function home(){
        $products = Product::all();
        return view('Front.home', compact('products'));
    }
    public function shop(){
        $products = Product::all();
        return view('Front.shop', compact('products'));
    }
    public function showCategory($id){
        $category_products = Product::where('category_id', $id)->get();
        $idd = $id ;
        return view('Front.category_list_products', compact('category_products' ,'idd'));
    }
    public function productDetails($id){
        $product= Product::findOrFail($id);
        return view('Front.product_details', compact('product'));
    }
    public function userProfile(){
        $user= Auth::user();
        return view('Front.userProfile', compact('user'));
    }
    public function updateUserProfile(Request $request){
        $user= Auth::user();
        $this->validate($request, [
                'name' => 'required',
                'email'=> 'required',
                'password'=> 'required_with:confirm_password|same:confirm_password|min:6',
                'confirm_password'=> 'required|min:6'
        ]);
        $user->name= $request->name ;
        $user->email= $request->email ;
        $user->password= bcrypt($request->password) ;
        $user->save();
        return back()->with('success', 'Profile Updated Successfully');
    }
}
