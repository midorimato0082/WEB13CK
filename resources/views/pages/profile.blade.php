@extends('pages_layout')
@section('content')
<div class="container">
    @foreach($user as $key => $value)
    @endforeach
    @if($value->customer_id == $cus->customer_id)
    <form action="{{ URL::to('/changeprofile'.$value->customer_id) }}" method="post" enctype="multipart/form-data">
        @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                        @php
                            Session::forget('fail');
                        @endphp
                    </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name = "customer_last_name" class="form-control" id="exampleInputEmail1" value="{{$cus->customer_last_name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name = "customer_first_name" class="form-control" id="exampleInputEmail1" value="{{$cus->customer_first_name}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name = "customer_email" class="form-control" id="exampleInputEmail1" value="{{$cus->customer_email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Avatar</label>
            <input type="file" name = "customer_avatar" class="form-control" id="exampleInputEmail1" }}">
            <p><img style="width:200px" src="{{asset('uploads/CustomerAvatar/'.$cus->customer_avatar)}}" alt=""></p>
          </div>
        <div class="form-group form-check">
          <input name="changepass" name = "customer_check" type="checkbox" class="form-check-input" id="changepassword">
          <label class="form-check-label" for="exampleCheck1">Đổi mật khẩu</label>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mật khẩu cũ</label>
          <input disabled type="text" name = "customer_password" class="form-control password" value="">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu mới</label>
            <input disabled type="text" name = "customer_new_password" class="form-control password" value="">
          </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật</button>
      </form>
      @endif
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $("#changepassword").change(function(){
            if($(this).is(":checked"))
            {
                $(".password").removeAttr('disabled');
            }
            else
            {
                $(".password").attr('disabled','');
            }

        })
    })
</script>
@endsection)