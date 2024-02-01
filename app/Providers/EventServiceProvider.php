<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Observers\UserStatusChangedObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\User;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserStatusChanged::class => [
            SendVerificationEmail::class,
        ],
             'App\Events\UserStatusChanged' => [
             'App\Listeners\SendVerificationEmail',
        ],
    ];



    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
