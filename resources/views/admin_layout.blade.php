<!-- Phượng -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="server/images/2.ico" type="image/ico" />
    <title>HomeStay Review</title>
    
    <!-- Bootstrap -->
    <link href="../server/Others/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap tags -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Ajax -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <!-- Font Awesome -->
    <link href="../server/Others/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- NProgress -->
    <link href="../server/Others/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Dropzone.js -->
    <link href="../server/Others/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../server/CSS/custom.min.css" rel="stylesheet">
    <link href="../server/CSS/dashboard.css" rel="stylesheet">
    

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="./index.html" class="site_title"><img src="../server/images/logo.png" alt=""></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="../uploads/AdminAvatar/<?php
                            $avatar = Session::get('admin_avatar');
                            if ($avatar) {
                            echo $avatar;
                            }
                            ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Xin chào,</span>
                            <h2><?php
                                $name = Session::get('admin_first_name');
                                if ($name) {
                                echo $name;
                                }
                                ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a href="{{ URL::to('/trang-chu') }}"><i class="fa fa-home"></i>Trang chủ </a>
                                </li>
                                <li><a><i class="fas fa-user-cog"></i> Admin<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ URL::to('/add-admin') }}">Thêm admin</a></li>
                                        <li><a href="{{ URL::to('/all-admin') }}">Danh sách admin</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('/all-customer') }}"><i class="fas fa-user"></i> Khách hàng</a>
                                </li>
                                <li><a><i class="fa fa-map-marker"></i>Địa điểm<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ URL::to('/add-location') }}">Thêm địa điểm</a></li>
                                        <li><a href="{{ URL::to('/all-location') }}">Danh sách điạ điểm</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-list-alt"></i>Danh mục<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ URL::to('/add-category') }}">Thêm danh mục</a></li>
                                        <li><a href="{{ URL::to('/all-category') }}">Danh sách danh mục</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i>Bài viết<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ URL::to('/add-review') }}">Thêm bài viết</a></li>
                                        <li><a href="{{ URL::to('/all-review') }}">Danh sách bài viết</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Logout"
                            href="{{ URL::to('/logout') }}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="../uploads/AdminAvatar/<?php
                                    $avatar = Session::get('admin_avatar');
                                    if ($avatar) {
                                    echo $avatar;
                                    }
                                    ?>" alt="">
                                    <span>
                                        <?php
                                        $name = Session::get('admin_first_name');
                                        if ($name) {
                                        echo $name;
                                        }
                                        ?>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;">Hồ sơ</a>
                                    <a class="dropdown-item" href="{{ URL::to('/logout') }}"><i
                                            class="fa fa-sign-out pull-right"></i>Đăng xuất</a>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">1</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="../server/images/1.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>Khu Ngai</span>
                                                <span class="time">3 phút trước</span>
                                            </span>
                                            <span class="message">
                                                Tôi rất thích Web này, mong các bạn sẽ phát triển thêm...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>Xem tất cả thông báo</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <div class="right_col" role="main">
                @yield('admin_content')
            </div>


            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Review Homestay
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../server/Others/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="../server/Others/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FastClick -->
    <script src="../server/Others/vendors/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->
    <script src="../server/Others/vendors/nprogress/nprogress.js"></script>

    <!-- Dropzone.js -->
    <script src="../server/Others/vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!--Bootstrap tags -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    {{-- <script href="../server/JS/bootstrap-tagsinput.min.js"></script> --}}
    <!-- Custom Theme Scripts -->
    <script src="../server/JS/custom.min.js"></script>

    <!-- Custom JS -->
    <script src="../server/JS/dashboard.js"></script>

    <!-- Ckeditor -->
    <script src="../server/Others/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('review_content');
    </script>
    

</body>

</html>

<!-- End Phượng -->
