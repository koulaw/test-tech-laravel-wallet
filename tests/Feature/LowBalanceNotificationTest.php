<?php

declare(strict_types=1);

use App\Jobs\SendLowBalanceNotificationJob;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Queue;

test('a low balance mail notification is sent', function () {
    $users = User::factory()->count(10)->has(Wallet::factory()->poorGuy())->create();

    Queue::fake();

    SendLowBalanceNotificationJob::dispatch();

    Queue::assertPushed(SendLowBalanceNotificationJob::class);
});
