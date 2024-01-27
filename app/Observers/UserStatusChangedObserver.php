<?php

namespace App\Observers;

use App\Models\User;
use App\Events\UserVerified;
use App\Events\UserStatusChanged;


class UserStatusChangedObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

 
    // UserStatusChangedObserver.php

public function updated(User $user)
{
    // Cek jika status berubah menjadi 'terverifikasi'
    if ($user->isDirty('status') && $user->status === 'terverifikasi') {
        // Kirim email verifikasi
        Mail::to($user->email)->send(new VerificationEmail());
    }
}




    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
