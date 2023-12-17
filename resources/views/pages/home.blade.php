@extends('layout')
@section('content')

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider">
                    <button class="prev-btn">‹</button>
                    <ul class="dots">
                        @for($i = 0; $i < count($slider); $i++) <li data-index="{{ $i }}">
                            </li>
                            @endfor
                    </ul>
                    @foreach($slider as $key => $slide)
                    <div class="slide">
                        <img src="{{URL::to('public/upload/slider/'.$slide->slider_image)}}" alt="">
                    </div>
                    @endforeach
                    <button class="next-btn">›</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Danh Mục Sản Phẩm</h2>
                </div>
            </div>
            <div class="categories__slider owl-carousel">
                @foreach($category as $key =>$cate)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('public/upload/category/'.$cate->category_product_image)}}">
                        <h5><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Nổi Bật</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($all_product as $key => $product)
            <div class="col-lg-3 col-md-3 col-sm-6 mix">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{URL::to('public/upload/product/'.$product->product_image)}}">
                        <ul class="featured__item__pic__hover">
                            <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                            <!-- <li><a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}"><i class="fa fa-info"></i></a></li> -->
                            <?php
                            //use Illuminate\Support\Facades\Session;
                            $customer_id = Session::get('customer_id');
                            if ($customer_id != NULL) {

                            ?>
                                <li><a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-shopping-cart"></i></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{($product->product_name)}}</a></h6>
                        <h5>{{number_format($product->product_price).' '.'VNĐ'}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- Featured Section End -->


@endsection