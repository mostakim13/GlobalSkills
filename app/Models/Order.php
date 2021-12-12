<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cart;

class Order extends Model
{
    use HasFactory;
      protected $table ="orders";
      public function user()
      {
        return $this->belongsTo(User::class,'user_id');
      }

      public function cart()
      {
        return $this->belongsTo(Cart::class);
      }
}
