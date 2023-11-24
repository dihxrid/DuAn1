<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\support\Facades\Session;
use Illuminate\support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){ 
    	$cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product   = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->get();
   
    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
   public function tim_kiem(Request $request){
   	$keywords = $request->keywords_submit;
   	$cate_product  = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $seach_product   = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
   
    	return view('pages.product.seach_product')->with('category',$cate_product)->with('brand',$brand_product)->with('seach_product',$seach_product);

   }
}
