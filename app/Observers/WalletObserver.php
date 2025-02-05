<?php

namespace App\Observers;

use App\Mail\LowBalanceMail;
use App\Models\Wallet;
use Illuminate\Support\Facades\Mail;

class WalletObserver
{
    /**
     * Handle the Wallet "created" event.
     */
    public function created(Wallet $wallet): void
    {
        //
    }

    /**
     * Handle the Wallet "updated" event.
     */
    public function updated(Wallet $wallet): void
    {
        if ($wallet->balance < 1000) {
            Mail::to($request->user())->send(new LowBalanceMail($this->user));
        }
    }

    /**
     * Handle the Wallet "deleted" event.
     */
    public function deleted(Wallet $wallet): void
    {
        //
    }

    /**
     * Handle the Wallet "restored" event.
     */
    public function restored(Wallet $wallet): void
    {
        //
    }

    /**
     * Handle the Wallet "force deleted" event.
     */
    public function forceDeleted(Wallet $wallet): void
    {
        //
    }
}
