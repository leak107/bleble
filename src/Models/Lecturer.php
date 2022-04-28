<?php

namespace App\Models;

use App\Models\User\Profile;
use Illuminate\Support\Collection;
use Stringable;

class Lecturer extends User implements Stringable
{
    public function __toString()
    {
        $name = $this->getFullName();
        $birthday = $this->getBirthday();

        return <<<HTML
        <ul>
            <li>Role      : Lecturer</li>
            <li>Name      : $name</li>
            <li>Birthday  : $birthday</li>
        </ul>
        HTML;

    }
}
