<?php

namespace App\Models;

class Course
{
    public function __construct(
        public string   $name,
        public int      $capacity,
        public Lecturer $lecturer,
    )
    {
        $this->lecturer->attachCourse($this);
    }
}
