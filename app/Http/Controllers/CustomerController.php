<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Customer;

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

    /* End Phượng */
}
