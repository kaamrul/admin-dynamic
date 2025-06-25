<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Notification;
use App\Models\EmailTemplate;
use App\Observers\UserObserver;
use App\Events\Auth\LoggedEvent;
use App\Listeners\Auth\LoggedListener;
use App\Observers\NotificationObserver;
use App\Events\Notification\CreateEvent;
use App\Events\Notification\DeleteEvent;
use App\Observers\EmailTemplateObserver;
use App\Listeners\Notification\CreateListener;
use App\Listeners\Notification\DeleteListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        /*
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        */
        LoggedEvent::class => [
            LoggedListener::class
        ],

    ];

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        User::class                 => [UserObserver::class],
        // Role::class                 => [RoleObserver::class],
        // Permission::class           => [PermissionObserver::class],
        EmailTemplate::class        => [EmailTemplateObserver::class],
    ];

    public function boot()
    {
        //
    }

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
