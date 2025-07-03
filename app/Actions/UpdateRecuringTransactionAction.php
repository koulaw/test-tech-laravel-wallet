<?php

namespace App\Actions;

use App\Models\RecuringTransaction;

readonly class UpdateRecuringTransactionAction
{
    public function execute(array $data, RecuringTransaction $recuringTransaction): RecuringTransaction {
     $recuringTransaction->update($data);

     return $recuringTransaction;
 }
}
