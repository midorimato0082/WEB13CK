<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Mail;

use Carbon\Carbon;

use App\Category;
use App\Location;
use App\Review;

session_start();

class HomeController extends Controller
{
    /* Phượng */
    public function error_page(){
        return view('errors.404');
    }

    public function index() {
        //Lấy cho header
        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->take(5)->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->take(20)->get();

        //Lấy cho footer
        $all_review_bac = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Bắc")
        ->take(4)->get();
        $all_review_nam = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Nam")
        ->take(4)->get();

        //Lấy bài viết mới nhất
        $lastest_review = Review::where('status', 1)->orderBy('created_at', 'DESC')->take(6)->get();
        $lastest_review_1 = array();
        $lastest_review_2 = array();
        foreach($lastest_review as $key => $lastest){
            if ($key < 3) {
                $lastest_review_1[] = $lastest;
            } else {
                $lastest_review_2[] = $lastest;
            }
        }
        
        return view('pages.home', compact('all_category', 'all_location', 'all_review_bac', 'all_review_nam', 'lastest_review_1', 'lastest_review_2'));
    }


    public function show_category_page($category_slug){
        //Lấy cho header
        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->take(5)->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->take(20)->get();

        //Lấy cho footer
        $all_review_bac = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Bắc")
        ->take(4)->get();
        $all_review_nam = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Nam")
        ->take(4)->get();

        $category = Category::where('category_slug', $category_slug)->take(1)->get();

        foreach($category as $key => $cate){
            $category_id = $cate->category_id;
            $category_name = $cate->category_name;
        }
        
        //Show bài viết thuộc danh mục
        $all_review_category = Review::with('category')->where('status', 1)->where('category_id', $category_id)->orderBy('category_id', 'DESC')->paginate(10);

        // Show bài viết gần đây nhất
        $lastest_review = Review::where('status', 1)->orderBy('created_at', 'DESC')->take(8)->get();
  
        return view('pages.category', compact('all_category', 'all_location', 'all_review_bac', 'all_review_nam', 'category_slug', 'category_name', 'all_review_category', 'lastest_review'));
    }

    public function show_location_page($location_slug){
        //Lấy cho header
        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->take(5)->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->take(20)->get();

        //Lấy cho footer
        $all_review_bac = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Bắc")
        ->take(4)->get();
        $all_review_nam = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Nam")
        ->take(4)->get();

        $location = Location::where('location_slug', $location_slug)->take(1)->get();

        foreach($location as $key => $loca){
            $location_id = $loca->location_id;
            $location_name = $loca->location_name;
        }
        
        //Show bài viết thuộc địa điểm
        $all_review_location = Review::with('category')->where('status', 1)->where('location_id', $location_id)->orderBy('location_id', 'DESC')->paginate(10);

        // Show bài viết gần đây nhất
        $lastest_review = Review::where('status', 1)->orderBy('created_at', 'DESC')->take(8)->get();
        // $all_review = Review::orderBy('review_id', 'DESC')->where('status', 1)->paginate(10);

        // return view('pages.category', compact('all_review_category', 'all_category', 'category_name', 'all_review'));
        return view('pages.location', compact('all_category', 'all_location', 'all_review_bac', 'all_review_nam', 'location_slug', 'location_name', 'all_review_location', 'lastest_review'));
    }

    public function show_review_page($review_slug){
        //Lấy cho header
        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->take(5)->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->take(20)->get();

        //Lấy cho footer
        $all_review_bac = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Bắc")
        ->take(4)->get();
        $all_review_nam = DB::table('tbl_review')->join('tbl_location', 'tbl_review.location_id', '=', 'tbl_location.location_id')
        ->join('tbl_region', 'tbl_location.region_id', '=', 'tbl_region.region_id')
        ->where('tbl_review.status', '=', 1)
        ->where('tbl_region.region_name', '=',"Miền Nam")
        ->take(4)->get();

        $review = Review::where('review_slug', $review_slug)->first();

        foreach($review as $key => $rev){
            $review_id = $rev->review_id;
            $review_name = $rev->review_name;
        }
        
        //Show bài viết thuộc địa điểm
        $all_review_location = Review::with('category')->where('status', 1)->where('location_id', $location_id)->orderBy('location_id', 'DESC')->paginate(10);

        // Show bài viết gần đây nhất
        $lastest_review = Review::where('status', 1)->orderBy('created_at', 'DESC')->take(8)->get();
        // $all_review = Review::orderBy('review_id', 'DESC')->where('status', 1)->paginate(10);

        // return view('pages.category', compact('all_review_category', 'all_category', 'category_name', 'all_review'));
        return view('pages.location', compact('all_category', 'all_location', 'all_review_bac', 'all_review_nam', 'review_name', 'all_review_location', 'lastest_review'));
    }


    /* End Phượng */
}
