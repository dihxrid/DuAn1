@extends('layout')
@section('content')
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <!-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Có phiếu giảm giá ? <a href="{{URL::to('/show-cart')}}">Bấm vào đây</a> để nhập mã của bạn
                    </h6>
                </div>
            </div> -->
        <div class="checkout__form">
            <h4>Chi tiết thanh toán</h4>
        </div>
        <form action="{{URL::to('/save-checkout')}}" method="POST">
            {{csrf_field()}}
            @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__input">
                                <p>Họ & Tên<span>*</span></p>
                                <input type="text" placeholder="Vui lòng nhập họ và tên" name="shipping_name">
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <p>Thành Phố<span>*</span></p>
                        <input type="text" placeholder="Vui lòng nhập thành phố" name="shipping_city">
                    </div>
                    <div class="checkout__input">
                        <p>Địa Chỉ<span>*</span></p>
                        <input type="text" placeholder="Số nhà, Khu phố, Tên đường, Phường/Quận" class="checkout__input__add" name="shipping_address">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Số Điện Thoại<span>*</span></p>
                                <input type="text" placeholder="Vui lòng nhập số điện thoại" name="shipping_phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" placeholder="Vui lòng nhập địa chỉ email" name="shipping_email">
                            </div>
                        </div>
                    </div>
                    <div class="checkout__input">
                        <p>Ghi Chú<span>*</span></p>
                        <input type="text" placeholder="Vui lòng nhập ghi chú của bạn." name="shipping_note">
                    </div>
                    <div class="shoping__cart__btns">
                        <a href="{{URL::to('/trang-chu')}}" class="primary-btn">Tiếp Tục Mua Sắm</a>
                        <button type="submit" class="primary-btn">Thanh Toán</button>
                    </div>
                </div>




            </div>
        </form>
    </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection