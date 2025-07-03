<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    public function __invoke(Request $request)
    {
       $wallet = $request->user()->wallet;
        $transactions = [];
        $balance = 0;

        if($wallet) {
            $transactions = $wallet->transactions()->with('transfer')->orderByDesc('id')->get();
            $balance = $wallet->balance;
        }

        return view('dashboard', compact('transactions', 'balance'));
    }
}
