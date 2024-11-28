@extends('layout')
@section('content')
<!-- Con giống -->
<div class="body">
    <div class="row">

        @foreach($cats as $cat)
        <div class="col-lg-2_5 col-md-4 col-6 post2">
            <a href="{{ route('detail', ['id' => $cat->id_sanpham]) }}">
                <div class="product">
                    <div class="product__img">
                        <img src="{{$cat->anhsp}}" alt="">
                    </div>
                    <div class="product__sale">
                        <div>
                            @if($cat->giamgia)
                            -{{$cat->giamgia}}%
                            @else Mới
                            @endif
                        </div>
                    </div>

                    <div class="product__content">
                        <div class="product__title">
                            {{$cat->tensp}}
                        </div>

                        <div class="product__pride-oldPride">
                            <span class="Price">
                                <bdi>
                                    {{ number_format($cat->giasp, 0, ',', '.') }}
                                    <span class="currencySymbol">₫</span>
                                </bdi>
                            </span>
                        </div>

                        <div class="product__pride-newPride">
                            <span class="Price">
                                <bdi>
                                    {{ number_format($cat->giakhuyenmai, 0, ',', '.') }}
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