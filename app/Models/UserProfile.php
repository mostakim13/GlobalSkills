<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserProfile extends Model
{
    use HasFactory;
      protected $table ="user_profiles";

          public function user(){
            return $this->hasMany(User::class, 'user_id');
          }
}
