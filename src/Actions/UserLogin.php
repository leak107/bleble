<?php

namespace App\Actions;

use App\Kinds\Container;
use App\Models\Lecturer;
use App\Models\Student;
use function Termwind\ask;
use function Termwind\render;

class UserLogin
{
    public function __construct(
        protected Container $container)
    {}

    public function __invoke(): void
    {
        $user = $this->findUser();

        $this->container->setAuthenticatedUser($user);
    }

    private function findUser(): Student|Lecturer
    {
        render('<h2 class="mt-2 bg-orange-300 p-5">Please Login</h2>');

        [$username, $password] = $this->collectInput();

        $user = $this->tryLoginStudent($username, $password);

        if (! $user) {
            $user = $this->tryLoginLecturer($username, $password);
        }

        if (! $user) {
            render('<h2 class="bg-red-300 p-5">Invalid username or password</h2>');

            return $this->findUser();
        }

        return $user;
    }

    private function collectInput(): ?array
    {
        $username = ask(<<<HTML
                <span class="mr-1 bg-green px-1 text-black">
                    Username: 
                </span>
            HTML
        );

        $password = ask(<<<HTML
                <span class="mr-1 bg-green px-1 text-black">
                    Password: 
                </span>
            HTML
        );

       return [$username, $password];
    }

    private function tryLoginStudent(mixed $username, mixed $password): ?Student
    {
        $student = $this->container
            ->students
            ->filter(fn(Student $student) => $student->getUsername() === $username)
            ->first();

        if (!empty($student) && $student->verifyPassword($password)) {
            return $student;
        }

        return null;
    }

    private function tryLoginLecturer(mixed $username, mixed $password): ?Lecturer
    {
        $lecturer = $this->container
            ->lecturers
            ->filter(fn(Lecturer $lecturer) => $lecturer->getUsername() === $username)
            ->first();

        if (!empty($lecturer) && $lecturer->verifyPassword($password)) {
            return $lecturer;
        }

        return null;
    }
}