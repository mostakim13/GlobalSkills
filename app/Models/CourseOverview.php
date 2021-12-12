<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainCategory;
use App\Models\CourseCategory;
use App\Models\Course;

class CourseOverview extends Model
{
    use HasFactory;
    protected $table ="course_overviews";

    public function main_category(){
      return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    public function course_category(){
      return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
    public function course(){
      return $this->belongsTo(Course::class, 'course_id','section_id');
    }

}
