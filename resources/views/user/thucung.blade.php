@extends('layout')
@section('content')
<!-- Con giống -->
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
                                        @if($cho->giamgia)
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
                                        @if($meo->giamgia)
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
@endsection