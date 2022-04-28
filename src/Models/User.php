<?php

namespace App\Models;

use App\Models\User\Profile;

class User
{
    public function __construct(
        protected Profile $profile,
        protected ?string $username = null,
        protected ?string $password = null,
    ) {
        $this->setPassword($password);
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(?string $password): void
    {
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    public function getFullName(): string
    {
        return ucwords($this->profile->firstName . $this->profile->lastName);
    }

    public function getBirthday(): string
    {
        return $this->profile->birthdate->format('d-F-Y');
    }

    public function verifyPassword(string $password): bool
    {
        if (empty($this->password)) {
            return false;
        }

        return password_verify($password, $this->password);
    }
}
