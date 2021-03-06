<?php
/* Phượng */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Review;
use App\Customer;
session_start();

class CategoryController extends Controller
{
    public function add_category(){
        $this->AuthLogin();
        return view('dashboard.category.add_category');
    }

    public function save_category(Request $request){
        $this->AuthLogin();

        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        if (isset($data['status'])) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();
        Session::put('message', 'Thêm danh mục thành công.');
        return redirect()->back();
    }

    public function all_category(){
        $this->AuthLogin();
        $all_category = Category::orderBy('category_id', 'DESC')->paginate(10);
        $user = Customer::all();
        return view('dashboard.category.all_category', compact('all_category','user'));
    }

    public function unactive_category($category_id){
        $this->AuthLogin();
        $category = Category::find($category_id);
        $category->status = 0;
        $category->save();
        Session::put('message', 'Thành công ẩn danh mục.');
        return redirect()->back();     
    }

    public function active_category($category_id){
        $this->AuthLogin();
        $category = Category::find($category_id);
        $category->status = 1;
        $category->save();
        Session::put('message', 'Kích hoạt danh mục thành công.');
        return redirect()->back();
    }

    public function edit_category($category_id){
        $this->AuthLogin();
        $edit_category = Category::find($category_id);
        return view('dashboard.category.edit_category', compact('edit_category'));
    }

    public function update_category(Request $request, $category_id){
        $this->AuthLogin();
        $data = $request->all();
        $category = Category::find($category_id);
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        if (isset($data['status'])) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();
        Session::put('message', 'Cập nhật danh mục thành công.');
        return redirect('all-category');
    }

    public function delete_category($category_id){
        $this->AuthLogin();
        $category = Category::find($category_id);
        $category->delete();
        Session::put('message', 'Xóa danh mục thành công.');
        return redirect()->back();
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
}
/* End Phượng */
