<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Statistic;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    /*kiểm tra nếu admin mới cho truy cập*/
    public function AuthenLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else 
            return Redirect::to('admin')->send();

    }


     public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthenLogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$admin_name = $request->admin_name;
    	$admin_password = $request->admin_password;

    	$result = DB::table('tbl_admin')->where('admin_name',$admin_name)->where('admin_password',$admin_password)->first();
    	if ($result) {
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return Redirect::to('/dashboard');
    	}
    	else{

			Session::put('message','*Tên đăng nhập hoặc mật khẩu không đúng*');
			return Redirect::to('/admin');


    	}
    	return view('admin.dashboard');
    }
    public function logout(){
        $this->AuthenLogin();
    	Session::put('admin_name',null);
    	Session::put('admin_id',null);
    	return Redirect::to('/admin');
    }
    public function filter_by_date(Request $request){
        $data = $request->all();
        $form_date = $data['form_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date',[$form_date,$to_date])->orderBy('order_date','ASC')->get(); 
         foreach($get as $key => $val){
            $chart_data[]= array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
            echo $data = json_encode($chart_data);
         }
    }

    // public function dashboard_filter(Request $request){
    //     $data = $request->all();
    //     $dauthangnay = Carbon::now('Asia/Buôn Ma Thuột')->startOfMonth()->toDateString();
    //     $dau_thangtruoc = Carbon::now('Asia/Buôn Ma Thuột')->subMonth()->startOfMonth()->toDateString();
    //     $cuoi_thangtruoc = Carbon::now('Asia/Buôn Ma Thuột')->subMonth()->endOfMonth()->toDateString();

    //     $sub7days= Carbon::now('Asia/Buôn Ma Thuột')->subdays(7)->toDateString();
    //     $sub365days= Carbon::now('Asia/Buôn Ma Thuột')->subdays(365)->toDateString();

    //     $now= Carbon::now('Asia/Buôn Ma Thuột')->toDateString();

    //     if($data['dashboard_value']=='7ngay'){
    //         $get = Statistic::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
    //     }elseif($data['dashboard_value']=='thangtruoc'){
    //         $get = Statistic::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
    //     }elseif($data['dashboard_value']=='thangnay'){
    //         $get = Statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
    //     }
    // }

        // public function show_dashboard(Request $request){
        //     $this->AuthLogin();

        
        // }
}
