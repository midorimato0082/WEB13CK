<!-- Phượng -->
<!-- Author: Nguyen Thi Bich Phuong, 17520926 -->
<!-- Author: Phung The Hung, 18520808 -->

<!doctype html>
<html lang="en">

<head>
    <title>Review HomeStay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- wowJS -->
    <link rel="stylesheet" href="../client/Others/lib/WOW-master/css/libs/animate.css">

    <!-- Slick -->
    <link rel="stylesheet" href="../client/Others/lib/slick/slick-1.8.1/slick/slick.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>

    <!-- Main css -->
    <link rel="stylesheet" href="../client/CSS/home.css">
    <link rel="stylesheet" href="../client/CSS/homestay.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
        integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
        crossorigin="anonymous" />
</head>

<body>
    <section class="header">
        <div class="container mt-4 px-0">
            <img src="/client/images/logo.png" alt="">
        </div>

        <div class="container mt-4">
            <nav class="navbar navbar-expand-lg container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ URL::to('/trang-chu') }}" style="color: #f68a39;">Trang chủ
                                <span class="sr-only">(current)</span></a>
                        </li>
                        @foreach ($all_category as $key => $category)
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ URL::to('/' . $category->category_slug) }}">{{ $category->category_name }}<span
                                        class="sr-only">(current)</span></a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="./hotel.html">{{ $all_category[1]->category_name }}<span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($all_location as $key => $location)
                                    <a class="dropdown-item"
                                        href="{{ URL::to('/location/' . $location->location_slug) }}">{{ $location->location_name }}</a>

                                @endforeach
                            </div>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Địa điểm
                            </a>

                        </li>
                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="search-box">
                                    <input type="text" placeholder="Từ khóa...">
                                    <div id="search" class="search-btn">
                                        <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    </div>
                                    <div id="cancel" class="cancel-btn">
                                        <a class="nav-link" href="#"><i class="fas fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="user-profile"><img src="../<?php
                                $avatar = Session::get('customer_avatar');
                                if ($avatar == 'no_avatar35.png') {
                                    echo 'server/images/no_avatar35.png';
                                } else {
                                    echo 'uploads/CustomerAvatar/';
                                    echo $avatar;
                                    } ?>">
                                </a>
                            </li>
                        </ul>
                    </form>
                </div>
            </nav>
        </div>
    </section>

    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer text-white pt-5 pb-4 mt-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <h3 class="mb-5">About us</h3>
                    <p>Chuyên trang Review & đánh giá các homestay - hostel - resort mới nhất, có view đẹp nhất với chi
                        phí phải chăng....</p>
                    {{-- <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <span class="input-group-text">Tìm kiếm</span>
                        </div>
                    </div> --}}
                    <div class="chinhanh">
                        <span>Chi nhánh: </span>
                        <a href="">Đà Lạt</a>
                        <a href="">Hà Nội</a>
                        <a href="">Sài Gòn</a>
                    </div>
                    <a class="lienhe" href="">Liên hệ truyền thông quảng cáo: 0999999999</a>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4">
                    <h3 class="mb-5">Home stay Miền Bắc</h3>
                    @foreach ($all_review_bac as $key => $review_bac)
                        <div class="row footer-item">
                            <div class="col-md-3">
                                @if ($review_bac->review_images == 'no_image23.png')
                                    <img src="../server/images/no_image23.png" height="100" width="100">
                                @else
                                    <img src="../uploads/ReviewImage/{{ explode('|', $review_bac->review_images)[0] }}"
                                        height="100" width="100">
                                @endif
                            </div>
                            <div class="col-md-9 col-lg-9 col-xl-9">
                                <h5>{{ $review_bac->review_title }}</h5>
                                <p>{{ $review_bac->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4">
                    <h3 class="mb-5">Home stay Miền Nam</h3>
                    @foreach ($all_review_nam as $key => $review_nam)
                        <div class="row footer-item">
                            <div class="col-md-3">
                                @if ($review_nam->review_images == 'no_image23.png')
                                    <img src="../server/images/no_image23.png" height="100" width="100">
                                @else
                                    <img src="../uploads/ReviewImage/{{ explode('|', $review_nam->review_images)[0] }}"
                                        height="100" width="100">
                                @endif
                            </div>
                            <div class="col-md-9 col-lg-9 col-xl-9">
                                <h5>{{ $review_nam->review_title }}</h5>
                                <p>{{ $review_nam->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container-fluid final-footer">
            <div class="container d-flex justify-content-between">
                <p>© 2017 - All Rights Reserved.</p>
                <p>Website Design: <a href="">Homestay Review</a></p>
            </div>
        </div>
        </div>
    </footer>

    <button onclick="topFunction()" id="myBtn"><i class="fa fa-arrow-up"></i></button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- wowjs -->
    <script src="../client/Others/lib/WOW-master/wow/wow.min.js"></script>
    <script>
        wow = new WOW({
            boxClass: 'wow', // default

        })
        wow.init();
    </script>

    <!-- Slick -->
    <script src="../client/Others/lib/slick/slick-1.8.1/slick/slick.min.js"></script>
    <script>
        $(".slider-nav").slick({
            autoplay: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: '<i class="fa fa-angle-left left"></i>',
            nextArrow: '<i class="fa fa-angle-right right"></i>'
        });
    </script>

    <script src="../client/JS/home.js"></script>
    <script src="../client/JS/homestay.js"></script>
</body>

</html>
<!-- End Phượng -->

{{-- <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HomeStay Review</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="../client/CSS/app.css">
    <link rel="stylesheet" type="text/css" href="../client/CSS/main.css">
    <link rel="stylesheet" type="text/css" href="../client/CSS/animate.css">
    <link rel="stylesheet" type="text/css" href="../client/CSS/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../client/CSS/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../client/CSS/main.css">
</head>
<body>
    <!-- Header -->
    <div class="container">
        @include('pages.navbar')
    </div>
    <!-- End header -->

    <!-- Content -->
    <div class="container content">
        @yield('content')
    </div>
    <!-- End content -->

    <!-- Footer -->
    <div class="container">
        @include('pages.footer')
    </div>
    <!-- End footer -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../client/JS/app.js"></script>
    <script type="text/javascript" src="../client/JS/main.js"></script>
    <script type="text/javascript" src="../client/JS/wow.min.js"></script>
    <script type="text/javascript" src="../client/JS/owl.carousel.min.js"></script>
    <script>
        wow = new WOW({
            boxClass: 'wow', // default
        })
        wow.init();
    </script> --}}
{{-- <script>
            $(document).ready(function () {
                $('.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                })
            });
        </script> --}}
{{-- <script>
        $(document).ready(function() {
            $('.carousel1').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                items: 2,
            })
            $('.carousel2').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                autoplay: true,
                items: 5,
            })
        });
    </script>
</body>
</html> --}}
