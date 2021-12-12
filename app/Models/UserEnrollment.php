<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEnrollment extends Model
{
    use HasFactory;
    protected $table ="user_enrollments";

    public function users(){

        return $this->belongsTo(User::class);
    }
    public function course(){

        return $this->belongsTo(Course::class);
    }

}
