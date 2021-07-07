<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review_title', 'review_slug', 'review_desc', 'review_content', 'review_images', 'tags', 'status', 'category_id', 'location_id', 'admin_id', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'review_id';
    protected $table = 'tbl_review';
    
    public function category(){
        return $this->belongsTo('App\Category', 'category_id'); //1 bài viết thuộc 1 danh mục
    }

    public function location(){
        return $this->belongsTo('App\Location', 'location_id'); //1 bài viết thuộc 1 địa điểm
    }

    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id'); //1 bài viết do 1 admin đăng bài
    }
}
