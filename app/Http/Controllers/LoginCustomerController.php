<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Customer;

session_start();

class LoginCustomerController extends Controller
{
    /* Phượng */
    public function index() {
        return view('customer_login');
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    public function pagehome(Request $request){
        $data = $request->all();
        $customer_email = $data['customer_email'];
        $customer_password = md5($data['customer_password']);

        $customer = Customer::where('customer_email', $customer_email)->where('customer_password', $customer_password)->first();

        if(isset($customer)){
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_first_name', $customer->customer_first_name);
            Session::put('customer_avatar', $customer->customer_avatar);
            return Redirect::to('trang-chu');
        } else {
            Session::put('message', 'Mật khẩu hặc tài khoản đã nhập không chính xác. Mời nhập lại.');
            return Redirect::to('login');
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('customer_first_name', null);
        Session::put('customer_id', null);
        Session::put('customer_avatar', null);
        return Redirect::to('/login');
    }

    public function getDangKy(){
        // $category = Category::all();
        // $categorynav = CategoryNav::all();
        return view('pages.dangky');
    }
    public function postDangKy(Request $request){
        $data = $request->validate([
            'customer_last_name'=>'required',
            'customer_first_name' => 'required',
            'customer_email' => 'required',
            'customer_password' => 'required',
            'customer_passwordAgain'=>'required',
        ],[
            'customer_last_name.required' => 'Tên không được để trống',
            'customer_first_name.required' =>'Tên không được để trống',
            'customer_email.required' => 'Email không được để trống',
            'customer_password.required' => 'Password không được để trống',
            'customer_passwordAgain.required' => 'Nhập lại mật khẩu không được để trống',
        ]);

        $user = new Customer();
        $user->customer_last_name = $request->customer_last_name;
        $user->customer_first_name = $request->customer_first_name;
        $user->customer_email = $request->customer_email;
        $user->customer_password =Hash::make($request->customer_password);
        $user->save();
        return redirect('dangky')->with('success','Đăng ký thành công');
        
    }
}
