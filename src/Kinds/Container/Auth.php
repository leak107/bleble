<?php
namespace App\Kinds\Container;

use App\Models\Lecturer;
use App\Models\Student;
use Stringable;

class Auth implements Stringable
{
    protected AuthType $authType;

    public function __construct(
        protected Student|Lecturer $user,
    )
    {
        $this->authType = $user instanceof Student ? AuthType::Student : AuthType::Lecturer;
    }

    public function __toString()
    {
        return (string) $this->user;
    }

    public function getUser(): Student|Lecturer
    {
        return $this->user;
    }

    public function isStudent(): bool
    {
        return $this->authType === AuthType::Student;
    }

    public function isLecturer(): bool
    {
        return $this->authType === AuthType::Lecturer;
    }
}