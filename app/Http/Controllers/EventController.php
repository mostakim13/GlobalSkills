<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminEvent;
use App\Models\EventDetail;

class EventController extends Controller
{
  public function index()
  {

    return view('frontend.pages.event');

  }
  public function event_details($id)
  {
    $events=AdminEvent::find($id);
    $event_details=EventDetail::where('admin_event_id',$id)->first();
    return view('frontend.pages.event_details',compact('events','event_details'));

  }
}
