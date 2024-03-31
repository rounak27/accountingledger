<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
    {
        return view('transaction');
    }
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'cid' => 'required|string|max:255',
        'particular' => 'required|string|max:255',
        'debit' => 'nullable|numeric',
        'credit' => 'nullable|numeric',
    ]);

    // Find the customer by cid
    $customer = Customer::where('cid', $validatedData['cid'])->first();

    // Check if the customer exists
    if (!$customer) {
        // Handle the scenario where the customer doesn't exist
        return redirect()->back()->with('error', 'Customer not found.');
    }

    
    // Calculate transaction balanced
    $previousBalance = Transaction::where('uid', $customer->cid)->orderBy('created_at', 'desc')->value('trn_balance') ?? 0;
   // dd($previousBalance);
    $transactionAmount = ($validatedData['debit'] ?? 0) - ($validatedData['credit'] ?? 0);
    $trnBalance = $previousBalance + $transactionAmount;

    // Generate unique trn_id
    $trn_id = $this->generateTrnId();

    // Create the transaction in the database
    $transaction = Transaction::create([
        'trn_id' => $trn_id,
        'trn_date' => now(),
        'particular' => $validatedData['particular'],
        'debit' => $validatedData['debit'] ?? 0,
        'credit' => $validatedData['credit'] ?? 0,
        'trn_balance' => $trnBalance, // Store the transaction balance
        'uid' => $customer->cid,
    ]);

    // Redirect to the transaction index page or any other page as needed
    return redirect()->route('add-transaction')->with('success', 'Transaction added successfully!');
}

    // Method to generate unique trn_id
    private function generateTrnId()
    {
        // Generate random part of trn_id
        $randomPart = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

        // Concatenate with prefix
        $trn_id = 'TRN-' . $randomPart;

        // Check if trn_id already exists
        while (Transaction::where('trn_id', $trn_id)->exists()) {
            // Regenerate if already exists
            $randomPart = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $trn_id = 'TRN-' . $randomPart;
        }

        return $trn_id;
    }
    public function showTransactions($cid)
    {
    // Retrieve customer details
    $customer = Customer::where('cid', $cid)->first();

    // If customer doesn't exist, handle accordingly (e.g., return error view)

    // Retrieve transactions associated with the customer
    $transactions = $customer->transactions()->orderBy('trn_date', 'desc')->get();

    // Return view with customer and transaction data
    return view('show', compact('customer', 'transactions'));
    }
}
