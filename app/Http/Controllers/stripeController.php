<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;


class stripeController extends Controller
{
    //
   
    public function session(Request $request)
    {
        $userId = auth()->user()->id; 

    
        $file = Files::where('user_id', $userId)->first();
        if ($file && $file->is_paid) {
            return redirect()->back()->with('error', 'You have already made a payment.');
        }
      
        $amount = $request->input('amount', 500);

        \Stripe\Stripe::setApiKey('sk_test_51P9ieEFzDwwNH06pKTBJMPBXnwuX0DALPs5qwKe1REnFgNlrGfcfYzjGBapYinKyXVqujQkHNPxgyDHN3Q8btgPC00uSAdffOw');

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'gbp',
                        'product_data' => [
                            'name' => 'Payment!!!!',
                        ],
                        'unit_amount'  => $amount, 
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('ab'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        $userId = auth()->user()->id; 

    // Update the payment status
    $file = Files::where('user_id', $userId)->first();
    if ($file) {
        $file->is_paid = true;
        $file->save();
    }

    return redirect()->back()->with('success', 'Payment Sucessful.');
    }
    public function deleteUserInfo(Request $request)
    {
        $fileId = $request->input('file_id');
    
        // Delete the file by its ID
        $file = Files::find($fileId);
        if ($file) {
            $file->delete();
            return redirect()->back()->with('success', 'File deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
    
}
