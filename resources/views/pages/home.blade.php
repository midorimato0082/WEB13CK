<!-- Phượng -->
@extends('pages_layout')
@section('content')

    {{-- <section class="carousel mt-5">
    <div class="container px-0">
        <div class="row container px-0 mx-0">
            <div class="col-md-6 col-lg-6 col-xl-6 carousel-left item p-0 ">
                <img src="/client/images/CardHomestay/1.jpeg" alt="">
                <div class="carousel-overlay1">
                    <h6 class="p-0">HomeStay miền bắc</h6>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 carousel-right">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6 item p-0">
                        <img src="/client/images/carousel/105625437_1120271368359451_2399958823443664218_n-357x210.jpeg"
                            alt="">
                        <div class="carousel-overlay">
                            <h6 class="p-0">HomeStay miền nam</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 item p-0 ">
                        <img src="/client/images/carousel/2-16482-357x210.jpeg" alt="">
                        <div class="carousel-overlay">
                            <h6 class="p-0">HomeStay miền trung</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6 item p-0">
                        <img src="/client/images/carousel/aa-16204-357x210.jpeg" alt="">
                        <div class="carousel-overlay">
                            <h6 class="p-0">HomeStay</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 item p-0 ">
                        <img src="/client/images/carousel/159512764_1342217616135054_2705855460809883874_n-357x210.jpeg"
                            alt="">
                        <div class="carousel-overlay">
                            <h6 class="p-0">Khách sạn</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

    <section class="list-most-view-post pt-4 body_style">
        <div class="container px-0">
            <div class="tag-heading">
                <a href="">NHIỀU NGƯỜI QUAN TÂM</a>
            </div>

            <div class="row mt-3">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/1.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Khám phá khu du lịch hồ Đồng Đò Sóc Sơn đang hot gần đây!</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/2.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Phát hiện một “Phượng Hoàng Cổ Trấn” ở Đà Lạt cực hot!</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/3.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Bỏ túi nghiệm du lịch Hà Giang đầy đủ nhất năm 2020! </a>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/4.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Du lịch Tam Đảo vào mùa đông! Tại sao không?</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/5.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Du Già Hà Giang, bạn đã ghé tới đây bao giờ chưa?</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/6.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Những điểm check-in Tam Đảo nhất định phải ghé 1 lần!</a>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/7.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Khám phá Đồng Văn Hà Giang qua 13 điểm check-in cực hot!</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/8.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Review Du lịch Phú Quốc mới nhất 2020!</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Trangchu/9.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Gợi ý lịch trình Du lịch Hà Giang cho dân phượt</a>
                </div>
            </div>
        </div>
    </section>

    <section class="list-popular-post mt-5">
        <div class="container">
            <div class="tag-heading">
                <a href="">BÀI VIẾT ĐANG NỔI</a>
            </div>

            <div class="row mt-3">
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="row">
                        <a href="">

                            {{-- <img class="myimg" src="../uploads/ReviewImage/{{ explode('|', $review_bac->review_images)[0] }}"> --}}
                        </a>
                        <a class="titleimg mt-1" href="">Ghé Ecofarm Gia Trịnh Ba Vì Trải Nghiệm Du Lịch…</a>
                    </div>
                    <div class="row mt-2">
                        <a href="">
                            <img class="myimg" src="/client/images/Trangchu/11.jpeg" alt="">
                        </a>
                        <a class="titleimg mt-1" href="">Phát Hiện Một Homestay Phú Quốc Có Rooftop Ngắm…</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="mt-5">
                        <a href="">
                            <img class="myimg1" src="/client/images/Trangchu/14.jpeg" alt="">
                        </a>
                        <a class="titleimg mt-2" href="">Top 10 Homestay Hạ Long Gần Biển Giá Tốt!</a>
                    </div>
                    <!-- <div class="mt-2">
                                
                            </div> -->


                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="row">
                        <a href="">
                            <img class="myimg" src="/client/images/Trangchu/12.jpg" alt="">
                        </a>
                        <a class="titleimg mt-1" href="">Khám Phá The Kadupul Homecation Đà Lạt Chỉ Từ…
                        </a>
                    </div>
                    <div class="row mt-2">
                        <a href="">
                            <img class="myimg" src="/client/images/Trangchu/13.png" alt="">
                        </a>
                        <a class="titleimg mt-1" href="">Ecosy Homestay Ba Vì – Biệt Thự Kiểu Âu Sang…</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="list-lastest-post mt-5">
        <div class="container px-0">
            <div class="tag-heading">
                <a href="">BÀI VIẾT MỚI NHẤT</a>
            </div>
                <div class="row mt-3">
                    @foreach ($lastest_review_1 as $key => $lastest1)
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <a href="">
                                @if ($lastest1->review_images == 'no_image23.png')
                                    <img class="myimg" src="../server/images/no_image23.png">
                                @else
                                    <img class="myimg"
                                        src="../uploads/ReviewImage/{{ explode('|', $lastest1->review_images)[0] }}">
                                @endif
                            </a>
                            <a class="titleimg mt-5" href="">{{ $lastest1->review_title }}</a>
                        </div>
                        @endforeach
                </div>
                <div class="row mt-2">
                    @foreach ($lastest_review_2 as $key => $lastest2)
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <a href="">
                                @if ($lastest2->review_images == 'no_image23.png')
                                    <img class="myimg" src="../server/images/no_image23.png">
                                @else
                                    <img class="myimg"
                                        src="../uploads/ReviewImage/{{ explode('|', $lastest2->review_images)[0] }}">
                                @endif
                            </a>
                            <a class="titleimg mt-5" href="">{{ $lastest2->review_title }}</a>
                        </div>
                        @endforeach
                </div>
            
            {{-- <div class="row mt-2">
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Lastest post/4.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Homestay Tam Đảo “Giá Rẻ”, Làm Việc Thiếu Chuyên Nghiệp!</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Lastest post/5.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Stella Mộc Châu – Homestay Sắc Màu</a>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4">
                    <a href="">
                        <img class="myimg" src="/client/images/Lastest post/6.jpg" alt="">
                    </a>
                    <a class="titleimg mt-5" href="">Mèo’s House Đà Lạt – Căn Biệt Thự Đặt Biệt Dành Cho “Team Con
                        Sen”</a>
                </div>
            </div> --}}
        </div>
    </section>
@endsection

<!-- End Phượng -->

{{-- @extends('pages_layout')
@section('content')
<section class="list-most-view-post pt-4">
    <div class="container px-0">
        <div class="tag-heading">
            <a href="">Tất cả bài viết</a>
        </div>
        <div class="owl-carousel carousel1">
            @foreach ($slide as $key => $value)
            <div> <img style="width:100% ;height:300px;border-radius:7px" src="{{asset('upload/'.$value->image_slide)}}" alt=""> </div>
           @endforeach
          </div>
        <div class="row mt-2">
            @foreach ($post as $key => $value)
            <div class="col-md-4 col-lg-4 col-xl-4 wow flipInX  "data-wow-time = "2s" data-wow-iteration = 1>    
                <a href="{{url('baiviet/'.$value->id_post)}}">
                    <img class="myimg" src="{{asset('upload/'.$value->image_post)}}" alt="">
                </a>
                @foreach ($category as $key => $cate)
                @if ($cate->id_category == $value->id_category)
                <div class="bottom-left bg-tag ml-2"><a class="tagimg" href="">{{$cate->title}}</a></div>
                @endif
                @endforeach
                <a class="titleimg mt-5" href="{{url('baiviet/'.$value->id_post)}}">{{$value->title_post}}</a>    
            </div>
            @endforeach
            
        </div>
    </div>
        {{$post->links()}}
    </div>

    <h1 style="text-align:center;text-transform:uppercase;margin-bottom:20px">Khuyến mãi hấp dẫn</h1>
    <div class="container">
        <div class="owl-carousel carousel2">
            @foreach ($slidef as $key => $valuef)
            <div> <img style="width:100%;height:300px;border-radius:30px" src="{{asset('upload/'.$valuef->image_slidef)}}" alt=""> </div>
           @endforeach
          </div>
    </div>
</section>
@endsection --}}
