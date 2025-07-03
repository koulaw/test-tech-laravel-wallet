<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\RecuringTransaction;

readonly class StoreRecuringTransactionAction {
    public function execute(array $data): RecurringTransaction {
        return RecuringTransaction::create($data);
    }
}
