<?php

use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý cửa hàng thú cưng</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/img/logo.jpg')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ys0BKqQbCyeNhqpe/lNl1dhq2BJvB5J1T4WPEWb9qIEG1YFUS3G+R3czm+3RfJ72

    <link rel=" stylesheet" href="{{ asset('frontend/css/bsgrid.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <style>

    </style>
</head>

<body>
    <div class="header">

        <div class="navbar">
            <div class="navbar__left">
                <a href="{{ URL::to('/')}}" class="navbar__logo">
                    <img src="{{ asset('frontend/img/ecc64b742cfb907f60b1d5d2b3aec91a.jpg') }}" alt="">
                </a>

                <div class="navbar__menu">
                    <i id="bars" class="fa fa-bars" aria-hidden="true"></i>
                    <ul>
                        <li><a href="{{ URL::to('/')}}">Trang chủ</a></li>
                        <li><a href="{{ URL::to('/thucung')}}">Thú cưng</a></li>
                        <li>
                            <a href="{{ URL::to('/donhang')}}">Đơn hàng</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('profile')}}">Tài khoản</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="navbar__center">
                <form action="{{route('search')}}" method="GET" class="navbar__search">
                    <input type="text" value="" placeholder="Nhập để tìm kiếm..." name="tukhoa" class="search" required>
                    <i class="fa fa-search" id="searchBtn"></i>
                </form>
            </div>

            <div class="navbar__right">
                @if (Auth::check())
                <?php $user = Auth::user(); ?>
                <?php $khachhang = Khachhang::where('idtaikhoan', $user->idtaikhoan)->first(); ?>
                <span class="mr-2" style="font-size: 14px;">{{$khachhang->hoten}}</span>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="border: none;" type="submit"><i class="fas fa-sign-out-alt text-primary" style="color:black !important;"></i></button>
                    </form>
                </div>
                @else
                <div class="login">
                    <a href="{{ URL::to('login') }}"><i class="fa fa-user"></i></a>
                </div>
                @endif

                <!-- Giỏ hàng -->
                <a href="{{ route('cart') }}" class="navbar__shoppingCart">
                    <img src="{{ asset('frontend/img/shopping-cart.svg') }}" style="width: 24px;" alt="Giỏ hàng">
                    @php
                    $cartCount = 0;
                    if (Auth::check()) {
                    $khachhangId = $khachhang->id_kh;
                    $cartCount = DB::table('giohang')
                    ->where('khachhang_id', $khachhangId)
                    ->count();
                    }
                    @endphp
                    <span>{{ $cartCount }}</span> 
                </a>

            </div>

        </div>

    </div>

    <!-- Content -->
    @yield('content')

    <footer>
        <div class="footer__info">
            <div class="footer__info-content">
                <h3>Địa chỉ</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.5407648565492!2d108.14437087489493!3d16.089303438900682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218cbbae2cc27%3A0xccfc5f2cea026e8e!2zUGhhbiBWxINuIMSQ4buLbmgsIEjDsmEgS2jDoW5oIELhuq9jLCBMacOqbiBDaGnhu4N1LCDEkMOgIE7hurVuZyA1NTAwMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1731570035853!5m2!1svi!2s" width="90%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="footer__info-content">
                <h3>Danh mục</h3>
                <p><a href="#spnb">Sản phẩm nổi bật</a></p>
                <p><a href="#spdcc">Sản phẩm cho chó</a></p>
                <p><a href="#spdcm">Sản phẩm cho mèo</a></p>
                <p><a href="#tc">Thú cưng</a></p>
                <p><a href="#tcsp">Tất cả sản phẩm</a></p>
            </div>
            <div class="footer__info-content">
                <h3>Liên hệ</h3>
                <p>Địa chỉ: Hòa Khánh Bắc, Liên Chiểu, Đà Nẵng</p>
                <p>Email: webchomeo@gmail.com</p>
                <p>Sđt: 0779533775</p>
            </div>

            <div class="footer__info-content">
                <h3>Fanpage</h3>
                <div class="footer__social">
                    <a href="https://www.facebook.com/profile.php?id=100036045152560" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/ColorlibHQ/AdminLTE/releases"><i class="fab fa-github"></i></a>
                    <a href="https://discord.com/channels/@me"><i class="fab fa-discord"></i></a>
                </div>
            </div>

        </div>
    </footer>
    <div class="go-to-top"><i class="fas fa-chevron-up"></i></div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5b4AE7ZfO7Luy1ept1Wo2h0LS2okAxq45b2XnF5JaZePnvf1pEWK22l6DgOwXa" crossorigin="anonymous"></script>

    <script>
        //Slider using Slick
        $(document).ready(function() {
            $('.post-wrapper').slick({
                slidesToScroll: 1,
                autoplay: true,
                arrows: true,
                dots: true,
                autoplaySpeed: 4000,
                prevArrow: $('.prev'),
                nextArrow: $('.next'),
                appendDots: $(".dot"),
            });


            // Slick multiple carousel
            $('.post-wrapper2').each(function() {
                $(this).slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1000,
                    prevArrow: $(this).closest('.post-slider2').find('.prev2'),
                    nextArrow: $(this).closest('.post-slider2').find('.next2'),
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 3,
                                infinite: true,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });

        });
    </script>
    <script src="{{ asset('frontend/script/script.js') }}"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0"></script>

</body>

</html>