<!-- Phượng -->
@extends('admin_layout')
@section('admin_content')
    <div>
        <h3 class="title">Khách hàng</h3>
        <div class="x_panel">
            <div class="x_content">
                <form action="{{ URL::to('/update-customer/' . $edit_customer->customer_id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <span class="section">Cập nhật khách hàng</span>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Họ<span>*</span></label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="customer_last_name"
                                value="{{ $edit_customer->customer_last_name }}" required />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tên<span>*</span></label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" class="form-control" name="customer_first_name"
                                value="{{ $edit_customer->customer_first_name }}" required />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Địa chỉ email<span>*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control" name="customer_email"
                                value="{{ $edit_customer->customer_email }}" required />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Mật khẩu mới</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="password" class="form-control" name="customer_password" />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Hình đại điện</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="file" class="form-control-file" name="customer_avatar" />
                            @if ($edit_customer->customer_avatar == 'no_avatar35.png')
                                <img class="mt-3" src="../server/images/no_avatar35.png" height="200" width="200">
                            @else
                                <img class="mt-3" src="../uploads/CustomerAvatar/{{ $edit_customer->customer_avatar }}" height="200"
                                    width="200">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3 mb-3">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                        echo '<span style="color:red; font-weight: bold;">' . $message . '</span>';
                        Session::put('message', null);
                        }
                        ?>
                    </div>

                    <div class="col-md-6 offset-md-3">
                        <button type="submit" name="update_customer" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
<!-- End Phượng -->
