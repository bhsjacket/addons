<?php

namespace BhsJacket\DisableAfterGraduation;

use DateTime;
use Illuminate\Contracts\Auth\Authenticatable;
use Statamic\Auth\UserProvider;

class DisableAfterGraduationProvider extends UserProvider {

    public function validateCredentials(Authenticatable $user, array $credentials): bool {
        if(parent::validateCredentials($user, $credentials)) {
            if(!$user->hasPermission('super')) {
                return $user->hasPermission('super') || $this->validateDate($user->get('graduation_year'));
            }
            return true;
        }
        return false;
    }

    private function validateDate($year): bool {
        if($year !== null) {
            $gradDate = DateTime::createFromFormat("Y-m-d", "$year-06-20");
            return new DateTime < $gradDate;
        }
        return true;
    }

}
