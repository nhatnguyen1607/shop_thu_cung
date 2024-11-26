@extends('layout')
@section('content')
<style>
    .reviews {
        margin-top: 20px;
    }
    .button{
        margin-left: 3vw;
    }
    .review-item {
        margin-left: 3vw;
        margin-top: 3vw;
        margin-right: 3vw;
        margin-bottom: 1vw;

    }

    .rating-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        /* background-color: #ccc; */
        margin: 0 3vw;
    }

    .average-rating {
        flex: 1;
        max-width: 40%;
        /* Đảm bảo phần average-rating không chiếm quá 40% chiều rộng */
    }

    .rating-details {
        flex: 1;
        max-width: 55%;
        /* Đảm bảo phần rating-details không chiếm quá 55% chiều rộng */
    }

    .progress-bar {
        height: 8px;
        border-radius: 4px;
    }
</style>
<!--Main-->
<div class="body" style="padding-top: 50px;">
    <a class="buy_continute" href="{{URL::to('/')}}"><i class="fa fa-arrow-circle-left"></i> Trở lại mua hàng</a>
    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
    @endif
    <div class="product_card mt-3">
        <div class="product__details-img mr-2">
            <div class="big-img">
                <img src="{{ asset($sanpham->anhsp) }}" alt="" id="zoom" style="visibility: visible;">
            </div>
        </div>

        <div class="product__details-info">
            <h3 style="margin-top: unset; line-height: unset;">{{ $sanpham->tensp }}</h3>
            <hr />

            <div class="product__pride">
                <div class="product__pride-oldPride" style="font-size: 20px; text-align: start;">
                    <span class="Price">
                        <bdi>
                            {{ number_format($sanpham->giasp, 0, ',', '.') }}
                            <span class="currencySymbol">₫</span>
                        </bdi>
                    </span>
                </div>
                <div class="product__pride-newPride" style="font-size: 40px; text-align: start;">
                    <span class="Price">
                        <bdi>{{ number_format($sanpham->giakhuyenmai, 0, ',', '.') }}
                            <span class="currencySymbol">₫</span>
                        </bdi>
                    </span>
                </div>

            </div>

            <form action="" method="POST">

                <div class="number">
                    <span>
                        Số lượng
                        <span class="number__count">
                            {{$sanpham->soluong}}
                        </span>
                    </span>

                </div>

                <div class="product__cart">
                    <a href="{{ route('add_to_cart', $sanpham->id_sanpham) }}" class="product__cart-add" name="add-to-cart">
                        Thêm vào giỏ hàng
                    </a>
                    <a href="{{ route('order', $sanpham->id_sanpham) }}" class="product__cart-buy" name="buy-now">Mua ngay</a>
                </div>

            </form>
        </div>
    </div>

    <!--Mô tả sản phẩm-->
    <div class="body__mainTitle">
        <h2>MÔ TẢ SẢN PHẨM</h2>
    </div>
    {{$sanpham->mota}}
    <hr>
    <div class="body__mainTitle">
        <h2>ĐÁNH GIÁ</h2>
        <div class="rating-wrapper d-flex justify-content-between align-items-start">
            <div class="average-rating">
                <strong style="margin-left:1vw;">{{ number_format($averageRating, 1) }}</strong> / 5
                <div>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <=$averageRating)
                        <span style="color: gold">&#9733;</span>
                        @else
                        <span style="color: #ccc;">&#9733;</span>
                        @endif
                        @endfor
                        <span>({{ $totalReviews }} lượt đánh giá.)</span>
                </div>
                <!-- <p>{{ $totalReviews }} lượt đánh giá</p> -->
            </div>

            <div class="rating-details" style="margin-right: 3vw;">
                @for ($i = 5; $i >= 1; $i--)
                <div class="d-flex align-items-center">
                    <span class="star-label">{{ $i }}</span>
                    <span style="color: gold;">&#9733;</span>
                    <div class="progress mx-2" style="flex: 1; height: 8px;">
                        <div class="progress-bar"
                            style="width: {{ ($totalReviews > 0) ? number_format(($ratingCounts[$i] ?? 0) / $totalReviews * 100, 2) : 0 }}%">
                        </div>
                    </div>
                    <span>{{ $ratingCounts[$i] ?? 0 }}</span>
                </div>
                @endfor
            </div>
        </div>
        <br>
        <div class="button">
            <button class="badge rounded-pill bg-primary" style="color: white; width:50px;border:none;">All</button>
            <button class="badge rounded-pill bg-success" style="color: white; width:50px;border:none;" data-rating="5">5 <span style="color: gold;">&#9733;</span> </button>
            <button class="badge rounded-pill bg-success" style="color: white; width:50px;border:none;" data-rating="4">4 <span style="color: gold;">&#9733;</span> </button>
            <button class="badge rounded-pill bg-warning" style="color: white; width:50px;border:none;" data-rating="3">3 <span style="color: gold;">&#9733;</span> </button>
            <button class="badge rounded-pill bg-danger" style="color: white; width:50px;border:none;" data-rating="2">2 <span style="color: gold;">&#9733;</span> </button>
            <button class="badge rounded-pill bg-danger" style="color: white; width:50px;border:none;" data-rating="1">1 <span style="color: gold;">&#9733;</span> </button>
        </div>
        @if($danhgias && !$danhgias->isEmpty())
        @foreach($danhgias as $danhgia)
        <div class="review-item" id="">
            <div class="review-header">
                <img src="{{ asset('frontend/img/6-anh-dai-dien-trang-inkythuatso-03-15-26-36.jpg') }}" alt="" style="height:30px; width:30px;">
                <strong>{{ $danhgia->hoten }}</strong>
                <div class="review-rating">
                @if(isset($danhgia) && $danhgia->rating == 5)
                <span class="badge rounded-pill bg-success" style="color: white;">Rất tốt</span>
                @elseif($danhgia->rating == 4)
                <span class="badge rounded-pill bg-success" style="color: white;">Tốt</span>
                @elseif($danhgia->rating == 3)
                <span class="badge rounded-pill bg-warning" style="color: white;">Trung bình</span>
                @elseif($danhgia->rating == 2)
                <span class="badge rounded-pill bg-danger" style="color: white;">Tệ</span>
                @elseif($danhgia->rating == 1)
                <span class="badge rounded-pill bg-danger" style="color: white;">Rất tệ</span>

                @endif

                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <=$danhgia->rating)
                        <span style="color: gold;">&#9733;</span>
                        @else
                        <span style="color: #ccc;">&#9733;</span>
                        @endif
                        @endfor
                </div>
            </div>
            <div class="review-content">
                <p>{{ $danhgia->noidung }}</p>
            </div>
            <hr width="100%" style="display: block; margin: 0 auto;">
        </div>
        @endforeach

        @else
        <p style="margin-left: 2vw;">Chưa có đánh giá cho sản phẩm này.</p>
        @endif

    </div>
    <hr>
    <!-- Sản phẩm ngẫu nhiên -->
    <div class="body__mainTitle">
        <h2>CÓ THỂ BẠN CŨNG THÍCH</h2>
    </div>
    <div class="row">
        @foreach($randoms as $random)
        <div class="col-lg-2_5 col-md-4 col-6 post2">
            <a href="{{ route('detail', ['id' => $random->id_sanpham]) }}">
                <div class="product">
                    <div class="product__img">
                        <img src="{{ asset($random->anhsp)}}" alt="">
                    </div>
                    <div class="product__sale">
                        <div>
                            @if($random->giamgia)
                            -{{$random->giamgia}}%
                            @else Mới
                            @endif
                        </div>
                    </div>

                    <div class="product__content">
                        <div class="product__title">
                            {{$random->tensp}}
                        </div>

                        <div class="product__pride-oldPride">
                            <span class="Price">
                                <bdi>
                                    {{ number_format($random->giasp, 0, ',', '.') }}
                                    <span class="currencySymbol">₫</span>
                                </bdi>
                            </span>
                        </div>

                        <div class="product__pride-newPride">
                            <span class="Price">
                                <bdi>
                                    {{ number_format($random->giakhuyenmai, 0, ',', '.') }}
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
@endsection