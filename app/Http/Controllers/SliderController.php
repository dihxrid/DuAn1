<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function AuthenLogin(){
        $admin_id =Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else 
            return Redirect::to('admin')->send();

    }
    public function unactive_slider ($slider_id){
        $this->AuthenLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        Session::put('message','Hiện slide Thành Công');
        return Redirect::to('all-slide');   
    }
    public function active_slider ($slider_id){
        $this->AuthenLogin();
        DB::table('tbl_slider')->where('brand_id',$slider_id)->update(['brand_status'=>0]);
        Session::put('message','Ẩn slide Thành Công');
        return Redirect::to('all-slide');
    }
    
    public function edit_slide($slider_id){
        $this->AuthenLogin();
        $edit_slide = DB::table('tbl_slider')->where('slider_id',$slider_id)->get();
        $manage_slider = view('admin.edit_slider')->with('edit_slide',$edit_slide);
        return view('admin_layout')->with('admin.edit_slider',$manage_slider);
    }
    public function delete_slide($slider_id){
        $this->AuthenLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
        Session::put('message','Xoá slide thành công');
        return Redirect::to('manage-slider');
    }
    public function manage_slider(){
        $all_slide = Slider::orderBy('slider_id','DESC')->get();
        return view('pages.slider.list_slider')->with(compact('all_slide')); 
    }
    public function add_slider(){
        return view('pages.slider.add_slider'); 
    }
    public function insert_slider(Request $request){
        $this ->AuthenLogin();

        $data = $request->all();
        $get_image = request('slider_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/upload/slider',$new_image);

            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->save();
            Session::put('message','Thêm thành công');
            return Redirect::to('add-slider');        
        }else{
            Session::put('message','Vui lòng thêm ảnh');
            return Redirect::to('add-slider');     
        }
    }

    public function update_slider(Request $request, $slider_id) {
    $this->AuthenLogin();

    $data = $request->all();
    $get_image = request('slider_image');

    // Check if image is present for update
    if ($get_image) {
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();

        $get_image->move('public/upload/slider', $new_image);

        // Update existing slider with new image
        Slider::where('slider_id', $slider_id)->update([
            'slider_name' => $data['slider_name'],
            'slider_image' => $new_image,
            'slider_status' => $data['slider_status'],
            'slider_desc' => $data['slider_desc'],
        ]);
    } else {
        // Update existing slider without changing image
        Slider::where('slider_id', $slider_id)->update([
            'slider_name' => $data['slider_name'],
            'slider_status' => $data['slider_status'],
            'slider_desc' => $data['slider_desc'],
        ]);
    }

    Session::put('message', 'Cập nhật thành công');
    return Redirect::to('update-slide');
    
}

}
