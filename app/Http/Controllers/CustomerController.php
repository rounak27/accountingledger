<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'cname' => 'required|string|max:255',
            'caddress' => 'required|string|max:255',
            'cphone' => 'required|string|max:15',
            
        ]);

        // Generate unique Cid
        $cid = $this->generateCid();

        // Store the customer in the database
        $customer = Customer::create([
            'cid' => $cid,
            'cname' => $validatedData['cname'],
            'caddress' => $validatedData['caddress'],
            'cphone' => $validatedData['cphone'],
            
        ]);

        // Redirect to the customer index page or any other page as needed
        return redirect()->route('register')->with('success', 'Customer created successfully,CID is ' . $cid);
    }

    // Method to generate unique Cid
    private function generateCid()
    {
        // Generate random part of Cid
        $randomPart = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Concatenate with prefix
        $cid = 'NEP-' . $randomPart;

        // Check if Cid already exists
        while (Customer::where('cid', $cid)->exists()) {
            // Regenerate if already exists
            $randomPart = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $cid = 'NEP-' . $randomPart;
        }

        return $cid;
    }
    public function show(){
        $customers=Customer::all();
        return view ('customer-list',compact('customers'));
    }
   
    public function graph($cid)
    {
        
    // Retrieve customer details
    $customer = Customer::where('cid', $cid)->first();

    // Retrieve transaction data for the customer
    $transactions = Transaction::where('uid', $cid)->orderBy('trn_date')->get();

    // Initialize arrays to store dates and balances
    $dates = [];
    $balances = [];

    // Iterate through transactions and populate arrays
    foreach ($transactions as $transaction) {
        $dates[] = Carbon::parse($transaction->trn_date)->format('Y-m-d'); // Format date as needed
        $balances[] = $transaction->trn_balance;
    }

    // Pass data to the view
    return view('graph', [
        'customer' => $customer,
        'dates' => $dates,
        'balances' => $balances
    ]);
}
}
