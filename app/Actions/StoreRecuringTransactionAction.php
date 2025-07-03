<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\RecuringTransaction;
use App\Models\User;

readonly class StoreRecuringTransactionAction {
    public function execute(array $data): RecurringTransaction {
        $data['user_id'] = $this->getRecipientFromEmail($data['recipient_email']);
        return RecuringTransaction::create($data);
    }

    private function getRecipientFromEmail(string $email): ?int {
        $user = User::where('email', $email)->first();
        return $user?->id;
    }
}
