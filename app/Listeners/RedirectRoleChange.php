<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\RoleChanged;

class RedirectRoleChange
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RoleChanged $event)
    {
        if ($event->newRole === 'admin') {
            return redirect()->route('admin.index');
        } elseif ($event->newRole === 'super_admin') {
            return redirect()->route('super_admin.index');
        }
    }
}
