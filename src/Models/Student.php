<?php

namespace App\Models;

use Stringable;

class Student extends User implements Stringable
{
    public function __toString()
    {
        $name = $this->getFullName();
        $birthday = $this->getBirthday();

        return <<<HTML
        <ul>
            <li>Role      : Student</li>
            <li>Name      : $name</li>
            <li>Birthday  : $birthday</li>
        </ul>
        HTML;
    }
}
