<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
      $currencies= Currency::all();
      return view('backend.pages.currency',compact('currencies'));
    }
    public function store(Request $request)
    {

        $currency_code = $request->currency_code;
        $exchange_rate = $request->exchange_rate;
        $status= $request->status;

        $currency = new Currency();
        $currency->currency_code = $currency_code;
        $currency->exchange_rate= $exchange_rate;
        $currency->status= $status;
        $currency->save();

      return back()->with('currency_added','Currency added successfully!');
    }
    public function update(Request $request)
    {
      $currency_code = $request->currency_code;
      $exchange_rate = $request->exchange_rate;
      $status= $request->status;


      $currency = Currency::find($request->id);
      $currency->currency_code = $currency_code;
      $currency->exchange_rate= $exchange_rate;
      $currency->status= $status;
      $currency->save();


        return back()->with('currency_updated','Currency updated successfully!');
    }

 
    public function delete($id){

      $currency = Currency::find($id);

      $currency->delete();

    return back()->with('currency_deleted','Currency deleted successfully!');
}
}
