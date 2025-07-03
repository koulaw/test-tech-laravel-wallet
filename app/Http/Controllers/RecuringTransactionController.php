<?php

namespace App\Http\Controllers;

use App\Actions\StoreRecuringTransactionAction;
use App\Http\Requests\RecuringTransactionRequest;
use App\Models\RecuringTransaction;
use Illuminate\Http\Request;

class RecuringTransactionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('recuring_transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recuring_transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecuringTransactionRequest $request, StoreRecuringTransactionAction $storeRecuringTransactionAction)
    {
        $storeRecuringTransactionAction->execute($request->validated());

        return redirect()->route('recuring_transactions.index')
            ->with('success', 'Recuring transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RecuringTransaction $recuringTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecuringTransaction $recuringTransaction)
    {
        return view('recuring_transactions.edit', compact('recuringTransaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRecuringTransactionAction $request, RecuringTransaction $recuringTransaction)
    {
        $recuringTransaction->update($request->validated(), $recuringTransaction);

        return redirect()->route('recuring_transactions.index')
            ->with('success', 'Recuring transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecuringTransaction $recuringTransaction)
    {
        $recuringTransaction->delete();

        return redirect()->route('recuring_transactions.index')
            ->with('success', 'Recuring transaction deleted successfully.');
    }
}
