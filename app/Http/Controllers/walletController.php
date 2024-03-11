<?php
namespace App\Http\Controllers;
use App\Models\Franchise;
use App\Models\Wallet;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class WalletController extends Controller
{


    // public function getFranchiseIds()
    // {
    //     $franchiseIds = Franchise::pluck('franchise_id')->toArray();
    
    //     // Store franchise IDs in the session
    //     Session::put('franchise_ids', $franchiseIds);
    
    //     return view('deposit-amount', compact('franchiseIds'));
    // }
    
    public function create(Request $request)
    {




        // Validation rules
        $rules = [
            'franchise_id' => 'required|exists:franchises,id',
            'amount' => 'required|numeric|min:0',
            'transaction_ss' => auth()->check() && auth()->user()->is_admin == 0 ? 'required|string' : 'nullable|string',
            'comments' => 'nullable|string',
            'transaction_id' => auth()->check() && auth()->user()->is_admin == 0 ? 'required|string' : 'nullable|string',
        ];
        

        // Validate the request data
        $request->validate($rules);

        // Create a new wallet transaction
        $walletTransaction = new Wallet([
            'franchise_id' => $request->input('franchise_id'),
            'amount' => $request->input('amount'),
            'transaction_ss' => $request->input('transaction_ss'),
            'comments' => $request->input('comments'),
            'transaction_id' => $request->input('transaction_id'),
        ]);

        // Save the wallet transaction
        $walletTransaction->save();

        // Retrieve the corresponding franchise record
        $franchise = Franchise::findOrFail($request->input('franchise_id'));

        // Update the wallet amount
        $franchise->wallet_amount += $request->input('amount');

        // Save the changes to the franchise record
        $franchise->save();

        // Optionally, you can return a response or redirect to a specific route
        return response()->json(['message' => 'Wallet transaction created successfully'], 201);
    }
}
