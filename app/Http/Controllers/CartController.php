<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use function Symfony\Component\VarDumper\Tests\Fixtures\bar;

class CartController extends Controller
{
    public function index(){
        $cartItems= Cart::content();
        return view('Cart.index', compact('cartItems'));

    }
    public function addItem ($id){
        $product = Product::findOrFail($id);
        Cart::add($id,$product->product_name, 1 , $product->product_price, ['img'=>$product->image, 'stock'=>$product->stock]);
        return back()->with('success_to_cart', 'Added To Your Cart');
    }
    public function update(Request $request, $id){
        $qty= $request->qty;
        $proID= $request->proId;
        $product= Product::findOrFail($proID);
        $stock=$product->stock;
        if($qty<$stock){
            Cart::update($id, $request->qty);
            return back()->with('status', 'Cart Updated Successfully');
        }
        else{
            return back()->with('error', 'Please Check your quantity is more than product stock');
        }

    }
    public function delete($id){
        Cart::remove($id);
        return back();
    }
}
