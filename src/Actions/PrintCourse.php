<?php

namespace App\Actions;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use function Termwind\render;

class PrintCourse
{
    /**
     * @param \App\Models\Lecturer|\App\Models\Student $user
     * @return void
     */
    public function __invoke(Lecturer|Student $user): void
    {
        $courses = $user->getCourses()->map(static fn(Course $course) => (string) $course)->implode('');

        render("<strong class='mt-1'>➡ Courses: </strong>");
        render(<<<HTML
        <table>
           $courses
        </table>
        HTML
        );
    }
}