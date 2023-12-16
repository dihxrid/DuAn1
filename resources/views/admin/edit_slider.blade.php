@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cập nhật Slider</h5>
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
      </div>
      <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
      <div class="widget-content nopadding">
      @foreach($edit_slide as $key => $sli)
        <form action="{{URL::to('/update-slide/'.$sli->slider_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
          {{csrf_field()}}  
          <div class="control-group">
            <label class="control-label">Tên Slide :</label>
            <div class="controls">
              <input data-validation="length" data-validation-length="min3" data-validation-error-msg="nhập ít nhất 3 ký tự" 
              type="text" name="slider_name" class="span11" value="{{($sli->slider_name)}}" placeholder="Nhập Tên slide"  />
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Mô Tả Slide :</label>
            <div class="controls">
              <textarea style="resize: none;" name="slider_desc" class="span11" rows="6" value="{{($sli->slider_desc)}}" placeholder="Nhập Mô Tả SLide"></textarea>
            </div>
          </div>
          <div class="control-group">
              <label class="control-label">Hình Ảnh Slide :</label>
              <div class="controls">
                <input type="file" name="slider_image" multiple />
                <img src="{{URL::to('public/upload/slider/'.$sli->slider_image)}}" width="100" height="100">
              </div>
            </div>
          <div class="control-group">
            <label class="control-label">Hiện Thị</label>
            <div class="controls">
              <select name="slider_status">
                <option value="0">Ẩn slide</option>
                <option value="1">Hiện slide</option>
              </select>
            </div>
          </div>
          @endforeach
          <div class="form-actions">
            <button type="submit" name="save_slider" class="btn btn-success">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection