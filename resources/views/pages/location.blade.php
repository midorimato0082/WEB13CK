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
                        href="{{ URL::to('/location/' . $location_slug) }}">{{ $location_name }}</a></li>
            </ol>
        </nav>
    </div>
</section>

    <section class="homestay mt-5">
        <div class="container p-0">
            <h1 class="mt-5">{{ $location_name }}</h1>
            <p>Chuyên trang số 1 về Review homestay Việt Nam!</p>
            <div class="row">
                <div class="col-md-8 col-lg-8 col-xl-8 homestay-left ">
                    @foreach ($all_review_location as $key => $review_location)
                        <div class="row mb-4 wow bounceInLeft hs-item">
                            <div class="col-md-5 col-lg-5 col-xl-5 left-img">
                                <a href="">
                                    @if ($review_location->review_images == 'no_image23.png')
                                        <img class="myimg" src="../server/images/no_image23.png">
                                    @else
                                        <img class="myimg"
                                            src="../uploads/ReviewImage/{{ explode('|', $review_location->review_images)[0] }}">
                                    @endif
                                    <div class="homestay-overlay">
                                        <h6>{{ $review_location->category->category_name }}</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-7 col-lg-7 col-xl-7">
                                <a href="">
                                    <h4>{{ $review_location->review_title }}</h4>
                                </a>
                                <p>{{ $review_location->review_desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 homestay-right">
                    <h4 class="mb-5">Bài viết gần đây</h4>
                    @foreach ($lastest_review as $key => $lastest)
                        <div class="ht-right-item">
                            <div class="row " style="padding: 0 16px;">
                                @if ($lastest->review_images == 'no_image23.png')
                                    <img class="myimg" src="../server/images/no_image23.png">
                                @else
                                    <img class="myimg"
                                        src="../uploads/ReviewImage/{{ explode('|', $lastest->review_images)[0] }}">
                                @endif
                                <h4>{{ $lastest->review_title }}</h4>
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
