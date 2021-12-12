<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;

class SystemController extends Controller
{
    public function Manage()
    {
      $vat_taxes= System::all();
      return view('backend.pages.system.manage',compact('vat_taxes'));
    }
    public function StoreSettings(Request $request)
    {

      $vat = $request->vat;
      $tax = $request->tax;
      $vat_tax = new System();
      $vat_tax->vat = $vat;

      $vat_tax->tax= $tax;

      $vat_tax->save();
      return back()->with('system_added','System Settings has been added successfully!');


    }
}
