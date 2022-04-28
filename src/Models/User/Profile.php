<?php

namespace App\Models\User;

class Profile
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $birthdate,
    ) {}
}
