<?php
namespace App\Kinds;

use App\Kinds\Container\Auth;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Collection;

class Container
{
    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Lecturer>
     */
    public Collection $lecturers;

    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Course>
     */
    public Collection $courses;

    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Student>
     */
    public Collection $students;

    public ?Auth $auth = null;

    public function __construct()
    {
        $this->lecturers = new Collection();
        $this->courses = new Collection();
        $this->students = new Collection();
    }

    private static ?Container $instance = null;

    public static function getInstance(): Container
    {
        if (self::$instance === null) {
            self::$instance = new Container();
        }

        return  self::$instance;
    }

    public function setAuthenticatedUser(Student|Lecturer $authenticatedUser): void
    {
        $this->auth = new Auth($authenticatedUser);
    }
}