<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogDetail;

class AdminBlog extends Model
{
    use HasFactory;
    protected $table ="admin_blogs";
    public function blog_details()
    {
      return $this->belongsTo(BlogDetail::class, 'blog_details_id');
    }
}
