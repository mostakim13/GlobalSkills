<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseCategory;
use App\Models\MainCategory;

class TrainingCourse extends Model
{
    use HasFactory;
    protected $table ="training_courses";

    protected $fillable =["main_category_id","course_category_id","course_title","image","training_fee","short_description","course_description","learning_outcomes","status"];

    public function main_category(){
      return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    public function course_category(){
      return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }



}
