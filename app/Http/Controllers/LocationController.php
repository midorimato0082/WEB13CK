<?php
/* Phượng */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Location;
use App\Region;

session_start();

class LocationController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_location(){
        $this->AuthLogin();
        $all_region = Region::where('status', 1)->orderBy('region_name', 'ASC')->get();
        return view('dashboard.location.add_location', compact('all_region'));
    }

    public function save_location(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $location = new Location();
        $location->location_name = $data['location_name'];
        $location->location_slug = $data['location_slug'];
        $location->region_id = $data['region_id'];
        if (isset($data['status'])) {
            $location->status = 1;
        } else {
            $location->status = 0;
        }

        $location->save();

        Session::put('message', 'Thêm địa điểm thành công.');
        return redirect()->back();
    }

    public function all_location(){
        $this->AuthLogin();
        $all_location = Location::with('region')->orderBy('location_id', 'DESC')->paginate(10);
        return view('dashboard.location.all_location', compact('all_location'));
    }

    public function unactive_location($location_id){
        $this->AuthLogin();
        $location = Location::find($location_id);
        $location->status = 0;
        $location->save();
        Session::put('message', 'Thành công ẩn địa điểm.');
        return redirect()->back();
    }

    public function active_location($location_id){
        $this->AuthLogin();
        $location = Location::find($location_id);
        $location->status = 1;
        $location->save();
        Session::put('message', 'Thành công kích hoạt địa điểm.');
        return redirect()->back();
    }

    public function edit_location($location_id){
        $this->AuthLogin();
        $all_region = Region::where('status', 1)->orderBy('region_name', 'ASC')->get();
        $edit_location = Location::find($location_id);
        return view('dashboard.location.edit_location', compact('edit_location', 'all_region'));
    }

    public function update_location(Request $request, $location_id){
        $this->AuthLogin();
        $data = $request->all();
        $location = Location::find($location_id);

        $location->location_name = $data['location_name'];
        $location->location_slug = $data['location_slug'];
        $location->region_id = $data['region_id'];
        if (isset($data['status'])) {
            $location->status = 1;
        } else {
            $location->status = 0;
        }

        $location->save();
        Session::put('message', 'Cập nhật địa điểm thành công.');
        return Redirect::to('all-location');
    }

    public function delete_location($location_id){
        $this->AuthLogin();
        $location = Location::find($location_id);
        $location->delete();

        Session::put('message', 'Xóa địa điểm thành công.');
        return redirect()->back();
    }  
}

/* End Phượng */