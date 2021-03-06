<!-- Phượng -->
@extends('admin_layout')
@section('admin_content')
    <div>
        <h3 class="title">Danh mục</h3>
        <div class="x_panel">
            <div class="x_content">
                <form action="{{ URL::to('/save-category') }}" method="post">
                    {{ csrf_field() }}
                    <span class="section">Thêm danh mục</span>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Tên danh mục<span>*</span></label>
                        <div class="col-md-4 col-sm-4">
                            <input type="text" class="form-control" name="category_name" onkeyup="ChangeToSlug();" id="slug" required/>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Slug</label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="category_slug" id="convert_slug" readonly/>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <div class="form-check col-md-3 col-sm-3 offset-md-4 mt-2">
                            <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                            <label class="form-check-label" for="invalidCheck2" style="font-size: 110%;">
                                Kích hoạt
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 offset-md-4 mb-2">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                        echo '<span style="color:red; font-weight: bold;">' . $message . '</span>';
                        Session::put('message', null);
                        }
                        ?>
                    </div>

                    <div class="col-md-3 offset-md-4">
                        <button type="submit" name="add_category" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
<!-- End Phượng -->