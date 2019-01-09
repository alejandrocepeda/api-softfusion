<?php

namespace App\Providers;

use App\Application;
use App\Business;
use App\Contact;
use App\Lead;
use App\Lender;
use App\Observers\ApplicationObserver;
use App\Observers\BusinessObserver;
use App\Observers\ContactObserver;
use App\Observers\LeadObserver;
use App\Observers\LenderObserver;
use App\Observers\UserObserver;
use App\User;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = ['App\Events\Event' => ['App\Listeners\EventListener']];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
        User::observe(UserObserver::class);
        Lead::observe(LeadObserver::class);
        Contact::observe(ContactObserver::class);
        Business::observe(BusinessObserver::class);
        Lender::observe(LenderObserver::class);
        Application::observe(ApplicationObserver::class);
    }
}
