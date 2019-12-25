<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index(){
        $products=DB::table('wishlists')->leftJoin('products', 'wishlists.product_id', '=', 'products.id')->where('user_id', Auth::id())->get();
        return view('Wishlist.index', compact('products'));
    }
    public function add($id){
        if(Auth::check()){
            $wishlistproduct = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
            //dd($wishlistproduct);
            if(!empty($wishlistproduct)){
                return back()->with('error', 'Already In Your Wishlist');
            }
            else {
            $product = Product::findOrFail($id);
            $wishlist=new Wishlist();
            $wishlist->product_id =$product->id;
            $wishlist->user_id =Auth::id();
            $wishlist->save();
            return back()->with('success', 'Added To Wishlist');
                
                }
            }
    }
    public function removeItem($id)
    {
        if (Auth::check()) {
            DB::table('wishlists')->where('user_id', Auth::id())->where('product_id', $id)->delete();
            return back()->with('removed_success', 'Removed Successfully');
        }
    }
}
