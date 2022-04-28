<?php 

require_once './Lecturer.php';

class Course
{
    private Lecturer $lecturer;

    /**
     * @param string $name
     * @param int $capacity
     */
    public function __construct(string $name, int $capacity)
    {
        $this->name = $name;
        $this->capacity = $capacity;
    }
    
}
