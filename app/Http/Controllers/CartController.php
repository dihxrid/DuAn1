<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\support\Facades\Session;
use Illuminate\support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Slider;
session_start();
class CartController extends Controller
{
	public function save_cart(Request $request){
		
        
		$productId =$request ->productid_hidden;
		$quantity = $request ->qty;

		$product_info = DB::table('tbl_product')->where('product_id',$productId)->first();


		//giỏ hàng shopping cart

		// Cart::add('293ad', 'Product 1', 1, 9.99, 550);
		$data['id']= $product_info->product_id;
		$data['qty']= $quantity;
		$data['name']= $product_info->product_name;
		$data['price']= $product_info->product_price;
		$data['weight']= '1';
		$data['options']['image']= $product_info->product_image;
		Cart::add($data);
		return Redirect::to('show-cart');
		

	}



	public function show_cart(){
        $slider = Slider::orderBy('slider_id', 'DESC')->get();
		$cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
		return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('slider', $slider);
	}

	public function delete_cart($rowId){
		Cart::update($rowId, 0); // set = 0 đưa về 0=> xóa giá trị dựa vào rowId
		return Redirect::to('show-cart');
	}
	public function update_cart(Request $request){
		$rowId = $request->rowId_cart;
		$qty = $request->cart_quantity;
		Cart::update($rowId, $qty);
		return Redirect::to('show-cart');
	}
}