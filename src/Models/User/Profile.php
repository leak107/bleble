<?php

namespace App\Models\User;

use Carbon\Carbon;

class Profile
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public Carbon $birthdate,
    ) {}
}
