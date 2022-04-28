<?php

namespace App\Actions;

use App\Kinds\Container;
use App\Models\Course;
use function Termwind\{render, ask};

class CreateCourse
{
    public function __construct(
        protected Container $container,
    ) {}

    public function __invoke(): void
    {
        $auth = $this->container->auth;

        if ($auth->isLecturer()) {
            [$name, $description, $capacity] = $this->collectInput();

            // declare course from inputted value
            $course = new Course($name, $description, $capacity, $auth->getUser());

            // push to courses
            $this->container->courses->push($course);
        } else {
            render('<h2 class="mt-2 bg-danger p-5">You are prohibited to create a course</h2>');
        }
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