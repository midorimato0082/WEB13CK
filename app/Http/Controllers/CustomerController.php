<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Customer;
use Mail;

use Carbon\Carbon;

use App\Category;
use App\Location;
use App\Review;
session_start();

class CustomerController extends Controller
{
    /* Phượng */
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_customer() {
        $this->AuthLogin();
        return view('dashboard.customer.add_customer');
    }

    public function save_customer(Request $request){
        $this->AuthLogin();

        $data = $request->all();
        $customer = new Customer();
        $customer->customer_last_name = $data['customer_last_name'];
        $customer->customer_first_name = $data['customer_first_name'];
        $customer->customer_email = $data['customer_email'];
        $customer->customer_password = md5($data['customer_password']);

        $get_image = $request->file('customer_avatar');
        
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/CustomerAvatar', $new_image);
            $customer->customer_avatar = $new_image;
            $customer->save();

            Session::put('message', 'Thêm tài khoản khách hàng thành công.');
            return redirect()->back();
        } else {
            $customer->customer_avatar = "no_avatar.png";
            $customer->save();
            Session::put('message', 'Thêm tài khoản khách hàng thành công.');
            return redirect()->back();
        }
    }

    public function all_customer()
    {
        $this->AuthLogin();

        $all_customer = Customer::orderBy('customer_id', 'DESC')->paginate(10);
        return view('dashboard.customer.all_customer', compact('all_customer'));
    }

    public function edit_customer($customer_id)
    {
        $this->AuthLogin();
        $edit_customer = Customer::find($customer_id);
        return view('dashboard.customer.edit_customer', compact('edit_customer'));
    }

    public function update_customer(Request $request, $customer_id)
    {
        $this->AuthLogin();

        $data = $request->all();

        $customer = Customer::find($customer_id);

        $customer->customer_last_name = $data['customer_last_name'];
        $customer->customer_first_name = $data['customer_first_name'];
        $customer->customer_email = $data['customer_email'];
 
        if($data['customer_password'] != null) {
            $customer->customer_password = md5($data['customer_password']);
        }

        $get_image = $request->file('customer_avatar');
        if ($get_image) {
            //Xóa ảnh cũ
            $image_old = $customer->customer_avatar;
            unlink('uploads/CustomerAvatar/'.$image_old);

            //Cập nhật ảnh mới
            $get_name_image = $get_image->getClientOriginalName();
            $name_image= current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/CustomerAvatar', $new_image);

            $customer->customer_avatar = $new_image;
        }
        $customer->save();
        Session::put('message', 'Cập nhật tài khoản khách hàng thành công.');
        return redirect('all-customer');
    }

    public function delete_customer($customer_id)
    {
        $this->AuthLogin();

        $customer = Customer::find($customer_id);
        $customer_avatar = $customer->customer_avatar;
        if ($customer_avatar) {
            unlink('uploads/customerAvatar/'.$customer_avatar);
        }
        $customer->delete();

        Session::put('message', 'Xóa tài khoản khách hàng thành công.');
        return redirect()->back();
    }
    public function profile($id){
        $cus = Customer::find($id);
        $user = Customer::all();
        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->take(5)->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->take(20)->get();
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


        return view('pages.profile', compact('all_category', 'all_location', 'all_review_bac', 'all_review_nam','cus','user'));
    }
    public function postprofile(Request $request,$id){
        $cus = Customer::find($id);
        $user = Customer::all();
        $all_category = Category::where('status', 1)->orderBy('category_name', 'ASC')->take(5)->get();
        $all_location = Location::where('status', 1)->orderBy('location_name', 'ASC')->take(20)->get();
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
        $this->AuthLogin();

        $data = $request->all();


        $cus->customer_last_name = $data['customer_last_name'];
        $cus->customer_first_name = $data['customer_first_name'];
        $cus->customer_email = $data['customer_email'];
 
        if($data['customer_password'] != null) {
            $cus->customer_password = md5($data['customer_password']);
        }

        $get_image = $request->file('customer_avatar');
        if ($get_image) {
            //Xóa ảnh cũ
            $image_old = $cus->customer_avatar;
            unlink('uploads/CustomerAvatar/'.$image_old);

            //Cập nhật ảnh mới
            $get_name_image = $get_image->getClientOriginalName();
            $name_image= current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/CustomerAvatar', $new_image);

            $customer->customer_avatar = $new_image;
        }
        $cus->save();
        Session::put('message', 'Cập nhật tài khoản khách hàng thành công.');
        return redirect('all-customer');
        
    }
    // public function changeprofile(Request $request,$id){
    //     $customerchange = Customer::find($id);
    //     $customerchange->customer_last_name = $request->customer_last_name;
    //     $customerchange->customer_first_name = $request->customer_first_name;
    //     $customerchange->customer_email = $request->customer_email;
    //     if($request->customer_password==$customerchange->customer_password){
    //         $customerchange->customer_password = $request->customer_new_password;
    //     }
    //     else{
    //         return view('pages.profile')->with(compact('cusall','customerchange'));
    //     }
    //     return view('pages.profile')->with(compact('cusall','customerchange'));
    // }
    /* End Phượng */
}

// $cus->customer_last_name = $request->customer_last_name;
        // $cus->customer_first_name = $request->customer_first_name;
        // $cus->customer_email = $request->customer_email;
        // if($request->customer_password==$cus->customer_password){
        //     $cus->customer_password = $request->customer_new_password;
        // }
        // else{
        //     // viết thử 
        //     return view('pages.profile', compact('all_category', 'all_location', 'all_review_bac', 'all_review_nam','cus','user'));
        // }
        
        // return view('pages.profile', compact('all_category', 'all_location', 'all_review_bac', 'all_review_nam','cus','user'));
