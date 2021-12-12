<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Multiple extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course(){

        return $this->belongsTo(Course::class,'course_id');
    }
}
