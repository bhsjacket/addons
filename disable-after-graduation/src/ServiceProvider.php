<?php

namespace BhsJacket\DisableAfterGraduation;

use Illuminate\Support\Facades\Auth;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider {

    public function boot() {
        $this->app->booted(function() {
            Auth::provider("statamic", function() {
                return new DisableAfterGraduationProvider;
            });
        });
    }

}
