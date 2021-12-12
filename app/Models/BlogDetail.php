<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdminBlog;

class BlogDetail extends Model
{
    use HasFactory;
    protected $table ="blog_details";

    public function admin_blog()
    {
      return $this->belongsTo(AdminBlog::class, 'admin_blog_id');
    }
    

}
