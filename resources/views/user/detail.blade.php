@extends('layout')
@section('content')

<style>
    .reviews {
        margin-top: 20px;
    }

    .product__cart-add {
        text-decoration: none;
    }

    .button {
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
        margin: 0 3vw;
    }

    .average-rating {
        flex: 1;
        max-width: 40%;
    }

    .rating-details {
        flex: 1;
        max-width: 55%;
    }

    .progress-bar {
        height: 8px;
        border-radius: 4px;
    }

    .carousel-inner {
        position: relative;
        width: 100%;
        height: 400px;
        overflow: hidden;
    }

    .carousel-item.active {
        opacity: 1;
    }

    .carousel-inner img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #ff4500 !important;
    }
</style>
<!--Main-->
<div class="body" style="padding-top: 50px;">
    <a class="buy_continute" href="{{URL::to('/')}}"><i class="fa fa-arrow-circle-left"></i> Trở lại mua hàng</a>
    @if(Session::has('error'))
    <div id="errorMessage" class="alert alert-danger" role="alert">
        {{ Session::pull('error') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('errorMessage').style.display = 'none';
        }, 2000);
    </script>
    @endif

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
    <div class="product_card mt-3">
        <div class="product__details-img mr-2">
            <div id="productCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($sanpham->anhSp as $key => $anhSP)
                    <li data-target="#productCarousel" data-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($sanpham->anhSp as $key => $anhSP)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ asset($anhSP->anh_sp) }}" class="d-block w-100" alt="Ảnh {{ $key + 1 }}">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev" style="color: #ff4500 !important;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next" style="color: #ff4500 !important;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
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
                    <a href="{{ route('add_to_cart', $sanpham->id_sanpham) }}" class="product__cart-add"
                        name="add-to-cart">
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
                        @if ($i <=floor($averageRating)) 
                        <span style="color: gold">&#9733;</span>
                        @elseif ($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5) 
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
            <button class="badge rounded-pill bg-primary filter-rating" style="color: white; width:50px;border:none;"
                data-rating="all">All</button>
            <button class="badge rounded-pill bg-success filter-rating" style="color: white; width:50px;border:none;"
                data-rating="5">5 <span style="color: gold;">&#9733;</span></button>
            <button class="badge rounded-pill bg-success filter-rating" style="color: white; width:50px;border:none;"
                data-rating="4">4 <span style="color: gold;">&#9733;</span></button>
            <button class="badge rounded-pill bg-warning filter-rating" style="color: white; width:50px;border:none;"
                data-rating="3">3 <span style="color: gold;">&#9733;</span></button>
            <button class="badge rounded-pill bg-danger filter-rating" style="color: white; width:50px;border:none;"
                data-rating="2">2 <span style="color: gold;">&#9733;</span></button>
            <button class="badge rounded-pill bg-danger filter-rating" style="color: white; width:50px;border:none;"
                data-rating="1">1 <span style="color: gold;">&#9733;</span></button>
        </div>

        <div id="review-container">
            @include('partials.reviews', ['danhgias' => $danhgias])
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.filter-rating').on('click', function() {
                let rating = $(this).data('rating');
                let id_sanpham = JSON.parse(@json($sanpham -> id_sanpham));
                console.log("Rating được chọn: " + rating);

                $.ajax({
                    url: "{{ route('evaluate.filter') }}",
                    method: 'GET',
                    data: {
                        rating: rating,
                        id_sanpham: id_sanpham
                    },
                    success: function(response) {
                        console.log(response);
                        $('#review-container').html(response);
                    },
                    error: function() {
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            });
        });
    </script>

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
                        <img src="{{ asset($random->anhSp->first()->anh_sp)}}" alt="">
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