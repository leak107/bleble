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
        $name = $this->user->getFullName();
        $birthday = $this->user->getBirthday();

        return <<<HTML
                    <ul>
                        <li>Name      : $name</li>
                        <li>Birthday  : $birthday</li>
                    </ul>
                HTML;
    }

    public function isStudent(): bool
    {
        return $user instanceof  Student;
    }

    public function isLecturer(): bool
    {
        return $user instanceof  Lecturer;
    }
}