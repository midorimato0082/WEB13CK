<!-- Phượng -->
@extends('admin_layout')
@section('admin_content')
    <div>
        <h3 class="title">Bài viết</h3>
        <div class="x_panel">
            <div class="x_content">
                <form action="{{ URL::to('/save-review') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <span class="section">Thêm bài viết</span>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Tiêu đề<span>*</span></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control" name="review_title" onkeyup="ChangeToSlug();" id="slug"
                                required />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Slug</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control" name="review_slug" id="convert_slug" readonly />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Mô tả tóm tắt<span>*</span></label>
                        <div class="col-md-11 col-sm-11">
                            <textarea style="resize: none" rows="2" class="form-control" name="review_desc"
                                required></textarea>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Nội dung<span>*</span></label>
                        <div class="col-md-11 col-sm-11">
                            <textarea rows="5" class="form-control" name="review_content" required></textarea>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Danh mục</label>
                        <div class="col-md-2 col-sm-2">
                            <select class="form-control input-sm" name="category_id">
                                @foreach ($all_category as $key => $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Địa điểm</label>
                        <div class="col-md-2 col-sm-2">
                            <select class="form-control input-sm" name="location_id">
                                @foreach ($all_location as $key => $location)
                                    <option value="{{ $location->location_id }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Hình ảnh</label>
                        <div class="col-md-3 col-sm-3 input-group">
                            <input type="file" class="form-control-file" name="review_images[]" multiple />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <label class="col-form-label col-md-1 col-sm-1 label-align">Tags bài viết</label>
                        <div class="col-md-11 col-sm-11">
                            <input type="text" data-role="tagsinput" class="form-control" name="tags" />
                        </div>
                    </div>
                    <div class="field item form-group">
                        <div class="form-check col-md-2 col-sm-2 label-align mt-2">
                            <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                            <label class="form-check-label" for="invalidCheck2" style="font-size: 110%;">
                                Kích hoạt
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-1 mb-2">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                        echo '<span style="color:red; font-weight: bold;">' . $message . '</span>';
                        Session::put('message', null);
                        }
                        ?>
                    </div>

                    <div class="col-md-6 offset-md-1">
                        <button type="submit" name="add_review" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
<!-- End Phượng -->
