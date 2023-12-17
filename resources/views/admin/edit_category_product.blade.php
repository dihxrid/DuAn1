@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cập Nhập Danh Mục Sản Phẩm</h5>
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
        @foreach($edit_category_product as $key => $edit_value)
        <div class="widget-content nopadding">
          <form action="{{URL::to('/update-category-product',$edit_value->category_id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="control-group">
              <label class="control-label">Tên Danh Mục :</label>
              <div class="controls">
                <input type="text" name="category_product_name" required="" value="{{$edit_value->category_name}}" class="span11" placeholder="Nhập Tên Danh Mục Sản Phẩm" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Mô Tả Danh Mục :</label>
              <div class="controls">
                <textarea style="resize: none;" name="category_product_desc" required="" class="span11" rows="6" placeholder="Nhập Mô Tả Danh Mục">{{$edit_value->category_desc}}</textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Hình Ảnh Danh Mục :</label>
              <div class="controls">
                <input type="file" name="category_product_image" required="" multiple/>
                <img src="{{URL::to('public/upload/category/'.$edit_value->category_product_image)}}" width="100" height="100">
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="update_category_product" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection