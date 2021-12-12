<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdminEvent;

class EventDetail extends Model
{
    use HasFactory;
    protected $table ="event_details";
    public function admin_event()
    {
      return $this->belongsTo(AdminEvent::class, 'admin_event_id');
    }

}
