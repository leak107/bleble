<?php

namespace App\Models;

use App\Models\User\Profile;
use Illuminate\Support\Collection;

class Lecturer extends User
{
    protected Collection $courses;

    public function __construct(
        Profile $profile,
        ?string $username = null,
        ?string $password = null,
    ) {
        parent::__construct($profile, $username, $password);

        $this->courses = new Collection();
    }

    public function attachCourse(Course $course): void
    {
        $this->courses->push($course);
    }
}
