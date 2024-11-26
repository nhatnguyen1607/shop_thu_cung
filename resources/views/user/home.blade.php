@extends('layout')
@section('content')

<div class="post-slider">
    <i class="fa fa-chevron-left prev" aria-hidden="true"></i>
    <i class="fa fa-chevron-right next" aria-hidden="true"></i>

    <div class="post-wrapper">
        @foreach($banners as $banner)
        <div class="post">
            <img src="{{ asset($banner->anhbanner)}}" alt="">
        </div>
        @endforeach
    </div>

</div>

<div class="body">
    @if(Session::has('message'))
    <div id="successMessage" class="alert alert-success" role="alert">
        {{Session::pull('message')}}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 2000); 
    </script>
    @endif

    <div class="body__mainTitle" id="spnb">
        <h2>Sản phẩm nổi bật</h2>
    </div>

    <div class="post-slider2">
        <i class="fa fa-chevron-left prev2" aria-hidden="true"></i>
        <i class="fa fa-chevron-right next2" aria-hidden="true"></i>

        <div class="row">
            <div class="post-wrapper2">
                @foreach($sanphams as $sanpham)
                <div class="col-lg-2_5 col-md-4 col-6 post2">
                    <a href="{{ route('detail', ['id' => $sanpham->id_sanpham]) }}">
                        <div class="product">
                            <div class="product__img">
                                <img src="{{$sanpham->anhsp}}" alt="">
                            </div>
                            <div class="product__sale">
                                <div>
                                    @if($sanpham->soluong==0)
                                    Hết hàng
                                    @elseif($sanpham->giamgia)
                                    -{{$sanpham->giamgia}}%
                                    @else Mới
                                    @endif
                                </div>
                            </div>

                            <div class="product__content">
                                <div class="product__title">
                                    {{$sanpham->tensp}}
                                </div>

                                <div class="product__pride-oldPride">
                                    <span class="Price">
                                        <bdi>
                                            {{ number_format($sanpham->giasp, 0, ',', '.') }}
                                            <span class="currencySymbol">₫</span>
                                        </bdi>
                                    </span>
                                </div>

                                <div class="product__pride-newPride">
                                    <span class="Price">
                                        <bdi>
                                            {{ number_format($sanpham->giakhuyenmai, 0, ',', '.') }}
                                            <span class="currencySymbol">₫</span>
                                        </bdi>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

<!-- Sản phẩm cho chó -->
<div class="body">

    <div class="body__mainTitle d-flex align-items-center" id="spdcc">
        <h2>Sản phẩm dành cho chó</h2>
    </div>

    <div class="dogfood active">
        <div class="post-slider3">
            <i class="fa fa-chevron-left prev3" aria-hidden="true"></i>
            <i class="fa fa-chevron-right next3" aria-hidden="true"></i>
            <div class="row">
                <div class="post-wrapper3">
                    @foreach($spcho as $dogproduct)
                    <div class="col-lg-2_5 col-md-4 col-6 post2">
                        <a href="{{ route('detail', ['id' => $dogproduct->id_sanpham]) }}">
                            <div class="product">
                                <div class="product__img">
                                    <img src="{{$dogproduct->anhsp}}" alt="">
                                </div>
                                <div class="product__sale">
                                    <div>
                                        @if($dogproduct->soluong==0)
                                        Hết hàng
                                        @elseif($dogproduct->giamgia)
                                        -{{$dogproduct->giamgia}}%
                                        @else Mới
                                        @endif
                                    </div>
                                </div>

                                <div class="product__content">
                                    <div class="product__title">
                                        {{$dogproduct->tensp}}
                                    </div>

                                    <div class="product__pride-oldPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($dogproduct->giasp, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>

                                    <div class="product__pride-newPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($dogproduct->giakhuyenmai, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<div class="banner">
    <div class="banner-top">
        <img src="{{ asset('frontend/img/BG-2.jpg')}}" />
    </div>
</div>

<!-- Sản phẩm cho mèo -->
<div class="body">

    <div class="body__mainTitle d-flex align-items-center" id="spdcc">
        <h2>Sản phẩm dành cho mèo</h2>
    </div>

    <div class="dogfood active">
        <div class="post-slider4">
            <i class="fa fa-chevron-left prev4" aria-hidden="true"></i>
            <i class="fa fa-chevron-right next4" aria-hidden="true"></i>
            <div class="row">
                <div class="post-wrapper4">
                    @foreach($spmeo as $catproduct)
                    <div class="col-lg-2_5 col-md-4 col-6 post2">
                        <a href="{{ route('detail', ['id' => $catproduct->id_sanpham]) }}">
                            <div class="product">
                                <div class="product__img">
                                    <img src="{{$catproduct->anhsp}}" alt="">
                                </div>
                                <div class="product__sale">
                                    <div>
                                        @if($catproduct->soluong==0)
                                        Hết hàng
                                        @elseif($catproduct->giamgia)
                                        -{{$catproduct->giamgia}}%
                                        @else Mới
                                        @endif
                                    </div>
                                </div>

                                <div class="product__content">
                                    <div class="product__title">
                                        {{$catproduct->tensp}}
                                    </div>

                                    <div class="product__pride-oldPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($catproduct->giasp, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>

                                    <div class="product__pride-newPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($catproduct->giakhuyenmai, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Thú cưng -->
<div class="body">

    <div class="body__mainTitle d-flex align-items-center" id="tc">
        <h2>Thú cưng</h2>
        <b>
            <div class="d-flex justify-content-center align-items-center ml-5" style="font-size: 26px;">
                <div id="clickDog" class="text-secondary activeColor mr-3">Chó</div>
                <div id="clickCat" class="text-secondary mr-3">Mèo</div>
            </div>
        </b>

    </div>
    <div class="dog active">
        <div class="post-slider5">
            <i class="fa fa-chevron-left prev5" aria-hidden="true"></i>
            <i class="fa fa-chevron-right next5" aria-hidden="true"></i>

            <div class="row">
                <div class="post-wrapper5">
                    @foreach($concho as $cho)
                    <div class="col-lg-2_5 col-md-4 col-6 post2">
                        <a href="{{ route('detail', ['id' => $cho->id_sanpham]) }}">
                            <div class="product">
                                <div class="product__img">
                                    <img src="{{$cho->anhsp}}" alt="">
                                </div>
                                <div class="product__sale">
                                    <div>
                                        @if($cho->soluong==0)
                                        Hết hàng
                                        @elseif($cho->giamgia)
                                        -{{$cho->giamgia}}%
                                        @else Mới
                                        @endif
                                    </div>
                                </div>

                                <div class="product__content">
                                    <div class="product__title">
                                        {{$cho->tensp}}
                                    </div>

                                    <div class="product__pride-oldPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($cho->giasp, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>

                                    <div class="product__pride-newPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($cho->giakhuyenmai, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="cat">
        <div class="post-slider6">
            <i class="fa fa-chevron-left prev6" aria-hidden="true"></i>
            <i class="fa fa-chevron-right next6" aria-hidden="true"></i>

            <div class="row">
                <div class="post-wrapper6">
                    @foreach($conmeo as $meo)
                    <div class="col-lg-2_5 col-md-4 col-6 post2">
                        <a href="{{ route('detail', ['id' => $meo->id_sanpham]) }}">
                            <div class="product">
                                <div class="product__img">
                                    <img src="{{$meo->anhsp}}" alt="">
                                </div>
                                <div class="product__sale">
                                    <div>
                                        @if($meo->soluong==0)
                                        Hết hàng
                                        @elseif($meo->giamgia)
                                        -{{$meo->giamgia}}%
                                        @else Mới
                                        @endif
                                    </div>
                                </div>

                                <div class="product__content">
                                    <div class="product__title">
                                        {{$meo->tensp}}
                                    </div>

                                    <div class="product__pride-oldPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($meo->giasp, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>

                                    <div class="product__pride-newPride">
                                        <span class="Price">
                                            <bdi>
                                                {{ number_format($meo->giakhuyenmai, 0, ',', '.') }}
                                                <span class="currencySymbol">₫</span>
                                            </bdi>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Tất cả sản phẩm -->
<div class="body">

    <div class="body__mainTitle" id="tcsp">
        <h2>TẤT CẢ SẢN PHẨM</h2>
    </div>

    <div>
        <div class="row">
            @foreach($alls as $all)
            <div class="col-lg-2_5 col-md-4 col-6 post2">
                <a href="{{ route('detail', ['id' => $all->id_sanpham]) }}">
                    <div class="product">
                        <div class="product__img">
                            <img src="{{$all->anhsp}}" alt="">
                        </div>
                        <div class="product__sale">
                            <div>
                                @if($all->soluong==0)
                                Hết hàng
                                @elseif($all->giamgia)
                                -{{$all->giamgia}}%
                                @else Mới
                                @endif
                            </div>
                        </div>

                        <div class="product__content">
                            <div class="product__title">
                                {{$all->tensp}}
                            </div>

                            <div class="product__pride-oldPride">
                                <span class="Price">
                                    <bdi>
                                        {{ number_format($all->giasp, 0, ',', '.') }}
                                        <span class="currencySymbol">₫</span>
                                    </bdi>
                                </span>
                            </div>

                            <div class="product__pride-newPride">
                                <span class="Price">
                                    <bdi>
                                        {{ number_format($all->giakhuyenmai, 0, ',', '.') }}
                                        <span class="currencySymbol">₫</span>
                                    </bdi>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <center style="margin-top: 30px;">
            <a href="{{route('viewAll')}}" class="btn text-white" style="background: #ff4500;">Xem thêm</a>
        </center>
    </div>

</div>

@endsection