
<script type="text/javascript" src="content/view/js/min.bootstrap.js"></script>

<div id="fb-root"></div>

<script type="text/javascript">
    var obj = {
        4: {
            url: '/vn/Ajax/Visitor',
            name: 'Lượt truy cập'
        },
        0: {
            title: 'Thông báo',
            close: 'Đóng'
        },
        1: {
            url: '...',
            name: 'chưa biết'
        },
        2: {
            controller: 'home',
            action: 'index'
        },
        3: {
            url: '/vn/Product/quickview'
        },
        5: {
            url: '/WebPart/Support'
        },
        6: {
            url: '/WebPart/CommentList',
            more: 'Xem thêm'
        },
        7: {
            url: '/WebPart/Schedule'
        },
        8: {
            urlFBSDK: '/vn/Account/FacebookSDKCallback',
            urlLogout: '/vn/Account/LogOut',
            nameLogout: 'Đăng xuất',
            confirmLogout: 'Bạn muốn đăng xuất khỏi hệ thống?',
            urlLogin: '/vn/Account/LogIn',
            nameLogin: 'Đăng nhập',
            urlRegister: '/vn/Account/Register',
            nameRegister: 'Đăng ký thành viên',
            urlFogot: '/vn/Account/Forgot',
            nameForgot: 'Khôi phục mật khẩu',
            urlCart: '/vn/Cart/Add2Cart',
            urlProfile: '/tai-khoan.html',
            urlMenu: '/WebPart/Menu',
            urlEmailExist: '/vn/Account/CheckEmail',
            urlCheck: '/vn/ajax/checkserial',
            nameCheck: 'Kiểm tra bảo hành',
            urlHome: '/trang-chu.html'
        },
        9: {
            required: '{0} không được để trống',
            equalto: '{0} không khớp với {1}',
            email: 'Email không đúng, vui lòng nhập lại',
            remote: '{0} đã được sử dụng'
        },
        10: {
            urlAdd: '/vn/Cart/Add2Cart',
            urlUpdate: '/vn/Cart/Update',
            urlRemove: '/vn/Cart/Remove',
            confirmRemove: 'Do you want to remove this product from the shopping bag?',
            urlBag: '/vn/Cart/Bag',
            urlCart: '/vn/checkout/confirm',
            urlTable: '/vn/Cart/TableCart',
            alert: 'Updates successfully cart',
            view: 'Xem giỏ hàng',
            continue: 'Tiếp tục mua hàng'
        }
    }; /*CHECK SCROLL*/
    
</script>

<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "../connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=137038486466895&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="content/view/js/jquery.cookie.js"></script>
<script src="content/view/js/jquery.lazyload.js"></script>
<script src="content/view/js/messi.js"></script>
<script src="content/view/js/jquery.dotdotdot.js"></script>
<script src="content/plugin/prettyPhoto/js/jquery.prettyPhoto.js"></script>
<script src="content/plugin/menu/jquery.smartmenus.js"></script>
<script src="content/plugin/menu/addons/bootstrap/jquery.smartmenus.bootstrap.min.js"></script>
<script src="content/plugin/OwlCarousel/owl-carousel/owl.carousel.js"></script>
<script src="content/plugin/MagnificPopup/jquery.magnific-popup.js"></script>
<script src="content/plugin/jquery.bxslider/jquery.bxslider.js"></script>
<!-- <script src="content/view/js/jquery.parallaxor.js"></script> -->
<script src="content/view/js/common.js"></script>
<script src="content/view/js/main.js"></script>
<script src="css/slick.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('.fancybox-media').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            helpers : {
                media : {}
            }
        });
        $('#owl-view-news').owlCarousel({
            itemsCustom: [
                [0, 1],
                [450, 2],
                [600, 2],
                [700, 2],
                [981, 3],
                [1000, 3]
            ],
            pagination: true,
            navigationText: false,
            navigation: false,
            autoPlay: true,
            slideSpeed: 300,
            paginationSpeed: 800,
            rewindSpeed: 1000
        });
        $('#owl-view-doitac').owlCarousel({
            itemsCustom: [
                [0, 2],
                [450, 2],
                [600, 3],
                [700, 4],
                [981, 5],
                [1000, 6]
            ],
            pagination: false,
            navigationText: false,
            navigation: false,
            autoPlay: true,
            slideSpeed: 300,
            paginationSpeed: 800,
            rewindSpeed: 1000
        });
         $('.slick-chiase').slick({
            infinite: true,//Lặp lại
            accessibility:true,
            //slidesToShow: 3,    //Số item hiển thị
            slidesToScroll: 1, //Số item cuộn khi chạy
            autoplay:false,  //Tự động chạy
            autoplaySpeed:3000,  //Tốc độ chạy
            speed:1000,//Tốc độ chuyển slider
            arrows:true, //Hiển thị mũi tên
            centerMode:false,  //item nằm giữa
            dots:true,  //Hiển thị dấu chấm
            draggable:true,  //Kích hoạt tính năng kéo chuột
            mobileFirst:true,
            pauseOnHover:true,
            responsive: [
            {
                breakpoint: 1366,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            ]
      });
    })
</script>