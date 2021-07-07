<!-- Phượng -->
@extends('pages_layout')
@section('content')
    {{-- Breadcrumb --}}
    <section>
        <div class="container px-0 mt-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-light" href="{{ URL::to('/trang-chu') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a class="text-light"
                            href="{{ URL::to('/' . $category_slug) }}">{{ $category_name }}</a></li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="homestay mt-5">
        <div class="container p-0">
            <h1 class="mt-5">{{ $category_name }}</h1>
            <p>Chuyên trang số 1 về Review homestay Việt Nam!</p>
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xl-8 homestay-left ">
                    @foreach ($all_review_category as $key => $review_cate)
                        <div class="row mb-4 wow bounceInLeft hs-item">
                            <div class="col-md-5 col-lg-5 col-xl-5 left-img">
                                <a href="{{ URL::to('/review/' . $review_cate->review_slug) }}">
                                    @if ($review_cate->review_images == 'no_image23.png')
                                        <img class="myimg" src="../server/images/no_image23.png">
                                    @else
                                        <img class="myimg"
                                            src="../uploads/ReviewImage/{{ explode('|', $review_cate->review_images)[0] }}">
                                    @endif
                                    <div class="homestay-overlay">
                                        <a class="location-tag" href="{{ URL::to('/location/' . $review_cate->location->location_slug) }}"><h6>{{ $review_cate->location->location_name }}</h6></a>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-7 col-lg-7 col-xl-7">
                                <a href="">
                                    <a class="review-title" href="{{ URL::to('/review/' . $review_cate->review_slug) }}"><h4>{{ $review_cate->review_title }}</h4></a>
                                </a>
                                <p>{{ $review_cate->review_desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 homestay-right">
                    <h4 class="mb-5">Bài viết gần đây</h4>
                    @foreach ($lastest_review as $key => $lastest)
                        <div class="ht-right-item">
                            <div class="row " style="padding: 0 16px;">
                                <a href="{{ URL::to('/review/' . $lastest->review_slug) }}">
                                @if ($lastest->review_images == 'no_image23.png')
                                    <img class="myimg" src="../server/images/no_image23.png">
                                @else
                                    <img class="myimg"
                                        src="../uploads/ReviewImage/{{ explode('|', $lastest->review_images)[0] }}">
                                @endif
                            </a>
                                <a class="review-title" href="{{ URL::to('/review/' . $lastest->review_slug) }}"><h4>{{ $lastest->review_title }}</h4></a>
                                <p>{{ $lastest->review_desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

<!-- End Phượng -->
