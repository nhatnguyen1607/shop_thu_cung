@extends('layout')
@section('content')
<!-- Con giống -->
<div class="body">
    <div class="row">
        @foreach($dogs as $dog)
        <div class="col-lg-2_5 col-md-4 col-6 post2">
            <a href="{{ route('detail', ['id' => $dog->id_sanpham]) }}">
                <div class="product">
                    <div class="product__img">
                        <img src="{{$dog->anhSp->first()->anh_sp}}" alt="">
                    </div>
                    <div class="product__sale">
                        <div>
                            @if($dog->soluong == 0)
                            Hết hàng
                            @elseif($dog->giamgia)
                            -{{$dog->giamgia}}%
                            @endif
                        </div>
                    </div>

                    <div class="product__content">
                        <div class="product__title">
                            {{$dog->tensp}}
                        </div>

                        <div class="product__pride-oldPride">
                            <span class="Price">
                                <bdi>
                                    {{ number_format($dog->giasp, 0, ',', '.') }}
                                    <span class="currencySymbol">₫</span>
                                </bdi>
                            </span>
                        </div>

                        <div class="product__pride-newPride">
                            <span class="Price">
                                <bdi>
                                    {{ number_format($dog->giakhuyenmai, 0, ',', '.') }}
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
    <a class="btn btn-secondary" href="{{URL::to('/thucung')}}">Quay lại</a>
</div>

@endsection