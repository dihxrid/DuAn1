 @extends('admin_layout')
 @section('admin_content')

 <div class="container-fluid">
  <style type="text/css">
      p.title_thongke{
        text-align:center;
        font-size:20px;
        font-weight:bold;
      }
  </style>
 </div>
 <div class="row" style="padding:0 0 0 90px">
      <p class="title_thongke">Thống kê doanh số</p>
      <form autocomplete="off">
    @csrf
    <div class="row" >
        <div class="col-md-2"  style="display:inline-block; padding:10px">
            <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
        </div>
        <div class="col-md-2"  style="display:inline-block; padding:10px ">
            <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
        </div>
        <!-- <div class="col-md-2"  style="display:inline-block; padding:10px ">
            <p>
                Lọc theo:
                <select class="dashboard-filter form-control">
                    <option>--Chọn--</option>
                    <option value="7ngay"> 7 ngày qua</option>
                    <option value="thangtruoc"> tháng trước</option>
                    <option value="thangnay"> tháng này</option>
                    <option value="365ngayqua"> 365 ngày qua</option>
                </select>
            </p>
        </div> -->
            <p><input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
    </div>
</form>
      <div class="col-md-12">   
          <div id="chart" style="height:250px "></div>
      </div>
 </div>

 <div class="row">
      <div class="col-md-4 col-xs-12">
            <p class="title_thongke">Thống kê tổng </p>
            <div id="donut" class="morris-donut-inverse"></div>
      </div>
 </div>
 @endsection