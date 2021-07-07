<?php
/* Phượng */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Review;
use App\Category;
use App\Location;
use App\Admin;
use App\GalleryImage;

session_start();

class ReviewController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_review()
    {
        $this->AuthLogin();
        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->get();
        return view('dashboard.review.add_review', compact('all_category', 'all_location'));
    }

    public function save_review(Request $request)
    {
        $this->AuthLogin();

        $data = $request->all();
        $review = new Review();
        $review->review_title = $data['review_title'];
        $review->review_slug = $data['review_slug'];
        $review->review_desc = $data['review_desc'];
        $review->review_content = $data['review_content'];
        $review->tags = $data['tags'];
        $review->category_id = $data['category_id'];
        $review->location_id = $data['location_id'];
        $review->admin_id = Session::get('admin_id');

        if (isset($data['status'])) {
            $review->status = 1;
        } else {
            $review->status = 0;
        }

        if($files = $request->file('review_images')){
            $images = array();
            foreach ($files as $file) {
                $get_name_file = $file->getClientOriginalName();
                $name_file = current(explode('.', $get_name_file));
                $new_file = $name_file . rand(0, 99) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/ReviewImage', $new_file);
                $images[]=$new_file;
            }
            $review->review_images = implode('|', $images);
        }
        else
        {
            $review->review_images="no_image23.png";
        }
        $review->save();
        Session::put('message', 'Thêm bài viết thành công.');
        return redirect()->back();
    }

    public function all_review()
    {
        $this->AuthLogin();
        $all_review = Review::with('category')->with('location')->with('admin')->orderBy('review_id', 'DESC')->paginate(10);
        return view('dashboard.review.all_review', compact('all_review'));
    }

    public function show_review_images($review_id){
        $this->AuthLogin();
        $review = Review::find($review_id);
        $review_title = $review->review_title;
        $review_images = explode("|", $review->review_images);

        return view('dashboard.review.show_review_image', compact('review_title', 'review_images'));
    }

    public function unactive_review($review_id)
    {
        $this->AuthLogin();
        $review = Review::find($review_id);
        $review->status = 0;
        $review->save();
        Session::put('message', 'Thành công ẩn bài viết.');
        return redirect()->back();
    }

    public function active_review($review_id)
    {
        $this->AuthLogin();
        $review = Review::find($review_id);
        $review->status = 1;
        $review->save();
        Session::put('message', 'Kích hoạt bài viết thành công.');
        return redirect()->back();
    }

    public function edit_review($review_id)
    {
        $this->AuthLogin();

        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->get();
        $edit_review = Review::find($review_id);

        return view('dashboard.review.edit_review', compact('edit_review', 'all_category', 'all_location'));
    }

    public function update_review(Request $request, $review_id)
    {
        $this->AuthLogin();
        $data = $request->all();

        $review = Review::find($review_id);
        $review->review_title = $data['review_title'];
        $review->review_slug = $data['review_slug'];
        $review->review_desc = $data['review_desc'];
        $review->review_content = $data['review_content'];
        $review->tags = $data['tags'];
        $review->category_id = $data['category_id'];
        $review->location_id = $data['location_id'];

        if (isset($data['status'])) {
            $review->status = 1;
        } else {
            $review->status = 0;
        }

        if($files = $request->file('review_images')){
            $images = array();
            $files_old = explode("|", $review->review_images);
            foreach($files_old as $file_old){
                unlink('uploads/ReviewImage/'.$file_old);
            }
            foreach ($files as $file) {
                $get_name_file = $file->getClientOriginalName();
                $name_file = current(explode('.', $get_name_file));
                $new_file = $name_file . rand(0, 99) . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/ReviewImage', $new_file);
                $images[]=$new_file;
            }
            $review->review_images = implode('|', $images);
        }
        $review->save();
        Session::put('message', 'Cập nhật bài viết thành công.');
        return redirect('all-review');
    }

    public function delete_review($review_id)
    {
        $this->AuthLogin();

        $review = Review::find($review_id);
        $review_images = $review->review_images;
        if ($review_images) {
            foreach($review_images as $image){
                unlink('uploads/ReviewImage/'.$image);
            }
        }
        $review->delete();

        Session::put('message', 'Xóa bài viết thành công.');
        return redirect()->back();
    }

    // public function get_review_slug($review_slug){

    // }

    
}
/* End Phượng */
