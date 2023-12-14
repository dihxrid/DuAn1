@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Liệt Kê Banner</h5>
          <div>
            <?php
            //use Illuminate\Support\Facades\Session;
            $message = Session::get('message');
              if ($message) {
              echo '<div class="alert alert-success" >' . $message . '</div>';
              Session::put('message', null);
            }
            ?>
          </div>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>Tên slide</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
                <th>Tình trạng </th>
                <th style="width:50px;"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($all_slide as $key => $slide)
              <tr class="gradeX">
                <td>{{$slide->slider_name}}</td>
                <td><img src="public/upload/slider/{{$slide->slider_image}}" height="100" width="100"></td>
                <td>{{$slide->slider_desc}}</td>
                <td>
                  <?php
                  if ($slide->slider_status == 0) {
                  ?>
                    <a href="{{URL::to('/unactive-slide-product/'.$slide->slider_id)}}"><span class="fa-eye-styling fa fa-eye-slash"></span></a>
                  <?php
                  } else {
                  ?>
                    <a href="{{URL::to('/active-slide-product/'.$slide->slider_id)}}"><span class="fa-eye-styling fa fa-eye"></span></a>
                  <?php
                  }
                  ?>
                </td>
                
                <td class="taskOptions">
                  <a href="{{URL::to('/edit-slide',$slide->slider_id)}}" class="tip-top" data-original-title="Update"><i class="icon-ok"></i></a>
                  <a href="{{URL::to('/delete-slide',$slide->slider_id)}}" onclick="return confirm('Bạn Có Muốn Xoá?')" class="tip-top" data-original-title="Delete"><i class="icon-remove"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!--js phân trang tìm kiếm-->

  <script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
  <script src="{{asset('public/backend/js/matrix.tables.js')}}"></script>
  @endsection