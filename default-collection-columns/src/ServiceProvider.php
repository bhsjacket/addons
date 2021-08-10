<?php

namespace BhsJacket\DefaultCollectionColumns;

use Illuminate\Support\Facades\Log;
use Statamic\Events\UserSaved;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider {

    protected $listen = [
        UserSaved::class => [
            UserSavedListener::class
        ]
    ];

}
