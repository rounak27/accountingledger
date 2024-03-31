<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
}
