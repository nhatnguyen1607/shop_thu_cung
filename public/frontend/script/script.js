
$(document).ready(function () {
    $("#bars").click(function () {
        $("#bars").toggleClass("bars_active");
    }),

        $("#searchBtn").click(function () {
            $(".search").toggleClass("searchBtn");
        }),

        window.addEventListener("scroll", function () {
            $(this).scrollTop() >= 700 ? $(".go-to-top").fadeIn() : $(".go-to-top").fadeOut();
        }),

        $(".go-to-top").click(function () {
            $("html, body").animate({ scrollTop: 0 });
        });

    $('#op1').click(function () {
        $('.momo').addClass('active');
        $('.cod').removeClass('active');
    })

    $('#op2').click(function () {
        $('.momo').removeClass('active');
        $('.cod').addClass('active');
    })

    //for dog
    $('#fordog').click(function () {
        $(this).addClass('activeColor');
        $('.dogfood').addClass('active');

        $('.dogstyle').removeClass('active');
        $('.dogequi').removeClass('active');

        $('#fordog2').removeClass('activeColor');
        $('#fordog3').removeClass('activeColor');
    })

    $('#fordog2').click(function () {
        $(this).addClass('activeColor');
        $('.dogstyle').addClass('active');

        $('.dogfood').removeClass('active');
        $('.dogequi').removeClass('active');

        $('#fordog').removeClass('activeColor');
        $('#fordog3').removeClass('activeColor');
    })

    $('#fordog3').click(function () {
        $(this).addClass('activeColor');
        $('.dogequi').addClass('active');

        $('.dogstyle').removeClass('active');
        $('.dogfood').removeClass('active');

        $('#fordog').removeClass('activeColor');
        $('#fordog2').removeClass('activeColor');
    })

    //for cat
    $('#forcat').click(function () {
        $(this).addClass('activeColor');
        $('.catfood').addClass('active');

        $('.catstyle').removeClass('active');
        $('.catequi').removeClass('active');

        $('#forcat2').removeClass('activeColor');
        $('#forcat3').removeClass('activeColor');
    })

    $('#forcat2').click(function () {
        $(this).addClass('activeColor');
        $('.catstyle').addClass('active');

        $('.catfood').removeClass('active');
        $('.catequi').removeClass('active');

        $('#forcat').removeClass('activeColor');
        $('#forcat3').removeClass('activeColor');
    })

    $('#forcat3').click(function () {
        $(this).addClass('activeColor');
        $('.catequi').addClass('active');

        $('.catstyle').removeClass('active');
        $('.catfood').removeClass('active');

        $('#forcat').removeClass('activeColor');
        $('#forcat2').removeClass('activeColor');
    })

    //con giong
    $('#clickCat').click(function () {
        // Thêm lớp activeColor cho nút Mèo và xóa khỏi nút Chó
        $(this).addClass('activeColor');
        $('#clickDog').removeClass('activeColor');
    
        // Hiển thị sản phẩm mèo và ẩn sản phẩm chó
        $('.cat').addClass('active');
        $('.dog').removeClass('active');
    
        // Hủy bỏ slick trước khi gọi lại cho post-wrapper6 (Mèo)
        $('.post-wrapper6').slick('unslick');
        
        // Gọi lại slick cho post-wrapper6
        $('.post-wrapper6').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.prev6'),
            nextArrow: $('.next6'),
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
    
    $('#clickDog').click(function () {
        // Thêm lớp activeColor cho nút Chó và xóa khỏi nút Mèo
        $(this).addClass('activeColor');
        $('#clickCat').removeClass('activeColor');
    
        // Hiển thị sản phẩm chó và ẩn sản phẩm mèo
        $('.dog').addClass('active');
        $('.cat').removeClass('active');
    
        // Hủy bỏ slick trước khi gọi lại cho post-wrapper5 (Chó)
        $('.post-wrapper5').slick('unslick');
        
        // Gọi lại slick cho post-wrapper5
        $('.post-wrapper5').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            prevArrow: $('.prev5'),
            nextArrow: $('.next5'),
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
    


    //upload anh dai dien
    let input = document.getElementById('fileUpload');
    let span = document.getElementById('fileUploadSpan');
    //input.addEventListener('change', () => {
    $('#fileUpload').change(function () {
        let files = input.files;

        if (files.length > 0) {
            if (files[0].size > 1000 * 1024) {
                span.innerText = 'Ảnh tối đa không được quá 1mb';
                $('#pictureUpload').attr('src', null);
                $('#hinh').attr("required", true);
                $('#hinh').val(null);
                return;
            }
        }
        //else {
            if (window.FormData !== undefined) {
                var fileUpload = $('#fileUpload').get(0);
                var filess = fileUpload.files;
                var formData = new FormData();
                formData.append('file', filess[0]);

                $.ajax(
                    {
                        type: 'POST',
                        url: '/Admin/ProcessUpload',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function (urlImage) {

                            $('#pictureUpload').attr('src', urlImage);
                            $('#hinh').val(urlImage);
                        },
                        error: function (err) {
                            alert('Error ', err.statusText);
                        }
                    });
            }
        //}

        span.innerText = '';
    });

    //upload anh thu vien

    $('#uploadhinh').change(function () {
        let input1 = document.getElementById('uploadhinh');
        let span1 = document.getElementById('fileUploadSpan1');

        let filess = input1.files;

        if (filess.length > 0) {
            if (filess[0].size > 1000 * 1024) {
                span1.innerText = 'Ảnh tối đa không được quá 1mb';
                $('#hinh1').attr("required", true);
                $('#hinh1').attr("value", null);
                return;
            } 
        }
        if (window.FormData !== undefined){
            $('#hinh1').attr("required", false);
        }


        span1.innerText = '';
    });

    $('#uploadhinh1').change(function () {
        let input1 = document.getElementById('uploadhinh1');
        let span1 = document.getElementById('fileUploadSpan2');

        let filess = input1.files;

        if (filess.length > 0) {
            if (filess[0].size > 1000 * 1024) {
                span1.innerText = 'Ảnh tối đa không được quá 1mb';
                $('#hinh2').attr("required", true);
                $('#hinh2').attr("value", null);
                return;
            }
        }
        if (window.FormData !== undefined) {
            $('#hinh2').attr("required", false);
        }

        span1.innerText = '';
    });

    $('#uploadhinh2').change(function () {
        let input1 = document.getElementById('uploadhinh2');
        let span1 = document.getElementById('fileUploadSpan3');

        let filess = input1.files;

        if (filess.length > 0) {
            if (filess[0].size > 1000 * 1024) {
                span1.innerText = 'Ảnh tối đa không được quá 1mb';
                $('#hinh3').attr("required", true);
                $('#hinh3').attr("value", null);
                return;
            }
        }
        if (window.FormData !== undefined) {
            $('#hinh3').attr("required", false);
        }

        span1.innerText = '';
    });

})
