@extends('layout')
@section('content')


<!-- Slider Banner -->
<div class="post-slider">
    <i class="fa fa-chevron-left prev" aria-hidden="true"></i>
    <i class="fa fa-chevron-right next" aria-hidden="true"></i>

    <div class="post-wrapper">
        @foreach($banners as $banner)
        <div class="post">
            <img src="{{ asset($banner->anhbanner)}}" alt="Banner">
        </div>
        @endforeach
    </div>
</div>

@if(Session::has('success'))
<div id="successMessage" class="alert alert-success" role="alert">
    {{ Session::pull('success') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000);
</script>
@endif

<!-- Sản phẩm nổi bật -->
<div class="body">
    <div class="body__mainTitle" id="spnb">
        <h2>Sản phẩm nổi bật</h2>
    </div>

    <div class="post-slider2">
        <i class="fa fa-chevron-left prev2" aria-hidden="true"></i>
        <i class="fa fa-chevron-right next2" aria-hidden="true"></i>

        <div class="row">
            <div class="post-wrapper2">
                @foreach($noibats as $noibat)
                <div class="col-lg-2_5 col-md-4 col-6 post2">
                    <a href="{{ route('detail', ['id' => $noibat->id_sanpham]) }}">
                        <div class="product">
                            <div class="product__img">
                                <img src="{{ asset($noibat->anhSp->first()->anh_sp) }}" alt="Product Image">
                            </div>
                            <div class="product__sale">
                                <div>
                                    @if($noibat->soluong == 0)
                                    Hết hàng
                                    @elseif($noibat->giamgia)
                                    -{{$noibat->giamgia}}%
                                    @else Mới
                                    @endif
                                </div>
                            </div>

                            <div class="product__content">
                                <div class="product__title">
                                    {{$noibat->tensp}}
                                </div>

                                <div class="product__pride-oldPride">
                                    <span class="Price">
                                        <bdi>
                                            {{ number_format($noibat->giasp, 0, ',', '.') }}
                                            <span class="currencySymbol">₫</span>
                                        </bdi>
                                    </span>
                                </div>

                                <div class="product__pride-newPride">
                                    <span class="Price">
                                        <bdi>
                                            {{ number_format($noibat->giakhuyenmai, 0, ',', '.') }}
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

<!-- Danh mục sản phẩm -->
<div class="body">
    @foreach($danhmucs as $danhmuc)
    <div class="body__mainTitle" id="spnb">
        <h2>{{ $danhmuc->ten_danhmuc }}</h2>
    </div>

    <div class="post-slider2">
        <i class="fa fa-chevron-left prev2" data-id="{{ $loop->index }}" aria-hidden="true"></i>
        <i class="fa fa-chevron-right next2" data-id="{{ $loop->index }}" aria-hidden="true"></i>

        <div class="row" style="margin-bottom: 2vw;">
            <div class="post-wrapper2">
                @foreach($danhmuc->sanphams as $sanpham)
                <div class="col-lg-2_5 col-md-4 col-6 post2">
                    <a href="{{ route('detail', ['id' => $sanpham->id_sanpham]) }}">
                        <div class="product">
                            <div class="product__img">
                                <img src="{{$sanpham->anhSp->first()->anh_sp}}" alt="Product Image">
                            </div>
                            <div class="product__sale">
                                <div>
                                    @if($sanpham->soluong == 0)
                                    Hết hàng
                                    @elseif($sanpham->giamgia)
                                    -{{$sanpham->giamgia}}%
                                    @else
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
    @endforeach
</div>

<section class="gallery" id="gallery">
    <div class="body__mainTitle">
        <h2 style="text-align: center;">THƯ VIỆN ẢNH</h2>
    </div>
    <div class="owl-carousel custom-carousel owl-theme">
        @foreach($gallerys as $gallery)
        <div class="item ">
            <img src="{{ asset($gallery->anhgallery)}}" alt="gallery">
        </div>
        @endforeach
    </div>
    </div>
</section>

<!-- Tất cả sản phẩm -->
<div class="body">
    <div class="body__mainTitle" id="tcsp">
        <h2>Tất cả sản phẩm</h2>
    </div>

    <div class="row">
        @foreach($alls as $all)
        <div class="col-lg-2_5 col-md-4 col-6 post2">
            <a href="{{ route('detail', ['id' => $all->id_sanpham]) }}">
                <div class="product">
                    <div class="product__img">
                        <img src="{{$all->anhSp->first()->anh_sp}}" alt="Product Image">
                    </div>
                    <div class="product__sale">
                        <div>
                            @if($all->soluong == 0)
                            Hết hàng
                            @elseif($all->giamgia)
                            -{{$all->giamgia}}%
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".gallery-slider", {
        grabCursor: true,
        loop: true,
        centeredSlides: true,
        spaceBetween: 20,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            700: {
                slidesPerView: 2,
            },
        }
    })
    $(".custom-carousel").owlCarousel({
        autoWidth: true,
        loop: true
    });
    $(document).ready(function() {
        $(".custom-carousel .item").click(function() {
            $(".custom-carousel .item").not($(this)).removeClass("active");
            $(this).toggleClass("active");
        });
    });
</script>
@endsection