<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Stringable;

class Course implements Stringable
{
    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Student>
     */
    public Collection $students;

    public string $id;

    public function __construct(
        public string   $name,
        public string   $description,
        public int      $capacity,
        public Lecturer $lecturer,
    )
    {
        $this->id = Str::uuid();
        $this->lecturer->attachCourse($this);
        $this->students = new Collection();
    }

    public function addStudent(Student $student): void
    {
        $this->students->push($student);
        $student->attachCourse($this);
    }

    public function removeStudent(Student $student): void
    {
        $this->students->pull($student);
    }

    public function __toString()
    {
        $description = Str::limit($this->description, 100, '...');

        return <<<HTML
        <tr class="mt-1">
          <td>$this->name</td>
          <td>$description</td>
          <td>$this->lecturer</td>
        </tr>
        HTML;
    }
}
