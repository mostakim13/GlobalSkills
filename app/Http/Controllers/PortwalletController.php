<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\UserEnrollment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use PortWallet\Exceptions\PortWalletException;
use Session;

use PortWallet\PortWallet;
use PortWallet\PortWalletClient;
use PortWallet\Exceptions\PortWalletClientException;


class PortwalletController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function portwallet()
    {
        return view('portwallet');
    }*/

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function PortwalletPost(Request $request)
    {
        Portwallet::setApiKey(env('STRIPE_SECRET'));
        PortWalletClient::create ([
                "amount" => 100 * 100,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Test payment from globalskills.com.bd"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }*/



    /**
     *
     * $appKey: application key you have to
     * generate form our sandbox panel
     *
     * $apiSecret: application secret key
     * you have to generate form
     * our sandbox panel
     *
     */


    /**
     * mode switching default "sandbox"
     */

    public function __construct()
    {
        session()->put('checkout', true);
        $this->middleware('auth');
    }

    public function index(Request $request){


        /*$validator = Validator::make($request->all(), [
            'amount'    => 'required',
            'email'     => 'required',
            'name'      => 'required',
            'phone'     => 'required',
        ],
            [
                //'course_id.unique' => ' Program name is already exist',
            ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
            //return back()->withInput()->withErrors($validator->errors());
        }*/
        if (PortWallet::getApiMode() == "sandbox") {

            $this->api_url = 'https://api-sandbox.portwallet.com/payment/v2/ ';
          //  $this->app_key = 'b0367cce4ca6fae035cec157c85c9d9e';
            //$this->secret_key = '9cb4aea573d1336165311690cebb8875';
            $this->app_key = '3ee2ab77858866db816aae7cff9c3e29';
            $this->secret_key = '55ba34e33ec387bc61a8d17da221f115';

        } else {
            $this->api_url = 'https://api.portwallet.com/payment/v2/invoice';
            $this->app_key = 'b0367cce4ca6fae035cec157c85c9d9e';
            $this->secret_key = '9cb4aea573d1336165311690cebb8875';
            //$this->app_key = '23b844c80146b36df469b0cf63d5080e';
            //$this->secret_key = 'a017c8cadeb13d7a9a72ec902573c287';

        }

        PortWallet::setApiMode("live");
//N.B.: API mode should be set first before creating an instance of PortWalletClient

        /**
         * initiate the PortWallet client
         */
        //dd($this->app_key,$this->secret_key);
        $portWallet = new PortWalletClient($this->app_key, $this->secret_key);
        //dd($portWallet);
        //$authorization = “Bearer “. base64_encode(APPKEY.”:”.md5(SECRETKEY.time()));
//dd($portWallet);
       /**
        * Your data
        */
      //  dd($request->amount);
       $data = array(
           'order' => array(
             //'amount' => 1,
              'amount' => floatval($request->amount),
               'currency' => 'BDT',
              // 'redirect_url' => 'https://globalskills.com.bd/portwallet/portwallet_verify_transaction/shopping_cart',
               'redirect_url' => URL::to('/portwallet/portwallet_verify_transaction/shopping_cart'),
               'ipn_url' => 'http://www.yoursite.com/ipn',
               'reference' => 'ABC123',
               'validity' => 900,
           ),
           'product' => array(
               'name' => $request->course_title,
               'description' => 'Course Payment',
           ),
           'billing' => array(
               'customer' => array(
                   'name' => $request->name,
                   'email' => $request->email,
                   'phone' => $request->phone,
                   'address' => array(
                       'street' => 'Hayat Rose Park, Level 5, House No 16 Main Road, Bashundhara Residential Area',
                        'city' => 'Dhaka',
                       'state' => 'Dhaka',
                       'zipcode' => 1229,
                       'country' => 'BGD',
                   ),
               ),
           ),
           'discount' => array(
               'enable' => 1,
               'codes' => array(
                   0 => 'Bengal 1',
                   1 => 'Bengal 2',
               ),
           ),
           'emi' => [
               'enable' => 1,
               'tenures' => [],
           ]
       );

       try {

           $invoice = $portWallet->invoice->create($data);

           $paymentUrl = $invoice->getPaymentUrl();

       } catch (InvalidArgumentException $ex) {
           echo $ex->getMessage();
       }catch (PortWalletException $ex) {
           echo $ex->getMessage();
       }

        //return redirect($paymentUrl);
        $notification=array(
            'message'=>'Congratulations Course has been successfully Enrolled!!!',
            'alert-type'=>'success'
        );
        return redirect($paymentUrl)->with($notification);
   }

    public function portwalletVerifyTransaction() {


        if ($_GET['status'] == 'ACCEPTED') {
            $cart_data= Cart::all();
          //  dd(session()->get('cart');
            foreach ($cart_data as $cart){


                $data = new UserEnrollment();
                $data->user_id          = $cart['user_id'];
                $data->course_id        = $cart['course_id'];
                $data->regular_price    = $_GET['amount'];
                $data->access           = 100;
                $data->created_by       = Auth::id();
                $data->save();
            }
            $notification=array(
                'message'=>'Congratulations Course has been successfully Enrolled!!!',
                'alert-type'=>'success'
            );
            //session()->forget('cart');
            Cart::truncate();
            return redirect('/carts')->with($notification);

        }



    }


}
