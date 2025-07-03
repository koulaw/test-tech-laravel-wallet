<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendLowBalanceNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::query()
            ->with('wallet')
            ->where('balance', '<', 10)
            ->get();

        if($users) {
            foreach ($users as $user) {
                $user->notify(new \App\Notifications\LowBlanceNotification($user->wallet->balance));
            }
        }
    }
}
