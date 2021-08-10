<?php

namespace BhsJacket\DefaultCollectionColumns;

use Illuminate\Support\Facades\Log;
use Statamic\Events\UserSaved;
use Statamic\Facades\User;

class UserSavedListener {

    public function handle(UserSaved $event) {
        $collectionPreferences = [
            "articles" => [
                "columns" => [
                    "section",
                    "title",
                    "date",
                    "content"
                ]
            ],
            "columns" => [
                "columns" => [
                    "section",
                    "title",
                    "date",
                    "content"
                ]
            ],
            "pages" => [
                "columns" => [
                    "title",
                    "content",
                    "slug"
                ]
            ]
        ];

        $event->user->setPreference("collections", $collectionPreferences);

        User::save($event->user);
    }

}
