<?php

namespace App\Models;

use Illuminate\Support\Collection;

class Course
{
    /**
     * @var \Illuminate\Support\Collection<string, \App\Models\Student>
     */
    public Collection $students;

    public function __construct(
        public string   $name,
        public string   $description,
        public int      $capacity,
        public Lecturer $lecturer,
    )
    {
        $this->lecturer->attachCourse($this);
        $this->students = new Collection();
    }

    public function addStudent(Student $student): void
    {
        $this->students->push($student);
    }

    public function removeStudent(Student $student): void
    {
        $this->students->pull($student);
    }
}
