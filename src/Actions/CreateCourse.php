<?php

namespace App\Actions;

use App\Kinds\Container;
use App\Models\Course;
use App\Models\Lecturer;

class CreateCourse
{
    public function __construct(
        protected Container $container,
    ) {}

    public function __invoke() {

        $user = $this->container->auth;
        if ($user->isLecturer()) {
            [$name, $description, $capacity] = $this->collectInput();
            $course = new Course($name, $description, $capacity, $user);
        } else {
            render('<h2 class="mt-2 bg-danger p-5">You are prohibited to create a course</h2>');
        }

        $this->container->courses->push($course);
    }

    private function collectInput(): ?array
    {
        $name = ask(<<<HTML
                <span class="mr-1 bg-green px-1 text-black">
                    Course name: 
                </span>
            HTML
        );

        $description = ask(<<<HTML
                <span class="mr-1 bg-green px-1 text-black">
                    Course description: 
                </span>
            HTML
        );

        $capacity = ask(<<<HTML
                <span class="mr-1 bg-green px-1 text-black">
                    Course capacity: 
                </span>
            HTML
        );

        return [$name, $description, $capacity];
    }
}