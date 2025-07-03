<?php

namespace App\Actions;

use App\Models\RecuringTransaction;
use App\Models\User;

readonly class UpdateRecuringTransactionAction
{
    public function execute(array $data, RecuringTransaction $recuringTransaction): RecuringTransaction
    {
        $data['user_id'] = $this->getRecipientFromEmail($data['recipient_email']);
        $recuringTransaction->update($data);

        return $recuringTransaction;
    }

    private function getRecipientFromEmail(string $email): ?int
    {
        $user = User::where('email', $email)->first();
        return $user?->id;
    }

}
