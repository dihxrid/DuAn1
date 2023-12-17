<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\support\Facades\Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\Slider;

session_start();

class HomeController extends Controller
{
    //slide
    public function index()
    {
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status','1')->get();
        $cate_product  = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $all_product   = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->get();

        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('slider', $slider);
    }
    public function tim_kiem(Request $request)
    {
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status','1')->get();
        $keywords = $request->keywords_submit;
        $cate_product  = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $seach_product   = DB::table('tbl_product')->where('product_name', 'like', '%' . $keywords . '%')->get();

        return view('pages.product.seach_product')->with('category', $cate_product)->with('brand', $brand_product)->with('seach_product', $seach_product)->with('slider', $slider);
    }
    public function testMail()
    {
        $name = 'HT Fresh Fruit';
        Mail::send('pages.mail.mail_regis', compact('name'), function ($email) use ($name) {
            $email->to('hoangdang3210@gmail.com', $name);
        });
    }
}
