<?php 

require_once './Course.php';

class Lecturer extends User
{
    private array $courses;

    public function createCourse(string $name, int $capacity)
    {
        array_push($this->courses, new Course($name, $capacity));

    }
}
