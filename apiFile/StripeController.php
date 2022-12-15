<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $price = $request->amount * 100;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $price,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session::flash('success', 'Payment successful!');

        return redirect('/');


        // Payment::create([
        //     'amount' => $price,
        //     'product_id' => $request->product_id,
        //     'status'     => 'paid',

        // ]);

    }
}





[10:32 PM, 7/30/2022] Mahbub SoClose: #################### REST API FETCH DATA ##################
    public function userlist()
    {
        $client = new Client();
        $response = $client->request('POST', 'https://novecology.fr/api/login', [
            'form_params' => [
                'email' => 'sadmin@admin.com',
                'password' => '@@Bladepro@123@@',
            ]
        ]);

        $data =  json_decode($response->getBody(), true);

        $token =  $data['token'];

        $userlist = $client->request('GET', 'https://novecology.fr/api/users', [

            'headers' =>
            [
                'Authorization' => "Bearer {$token}"
            ]

        ]);

        $lists =  json_decode($userlist->getBody(), true)['data'];

        // Delete Method

        $res = $client->request('GET', 'https://novecology.fr/api/user/1/delete', [

            'headers' =>
            [
                'Authorization' => "Bearer {$token}"
            ]

        ]);

        return view('api-users', compact('lists'));

    }



    ################# FILE EXPORT IMPORT ########################
        public function fileImportExport()
        {
        return view('file-import');
        }

        /**
        * @return \Illuminate\Support\Collection
        */
        public function fileImport(Request $request)
        {
            Excel::import(new UsersImport, $request->file('file')->store('temp'));
            return back();
        }
        /**
        * @return \Illuminate\Support\Collection
        */
        public function fileExport()
        {
            return Excel::download(new UsersExport(), 'users-collection.xlsx');
        }
[10:33 PM, 7/30/2022] Mahbub SoClose: <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Laravel 7 Import and Export CSV & Excel to Database Example
        </h2>
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <button class="btn btn-primary">Import data</button>
            <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
        </form>
    </div>
</body>
</html>