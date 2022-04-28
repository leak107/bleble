<?php

namespace App\Models;

use App\Models\User\Profile;
use Illuminate\Support\Collection;

class User
{
    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Course>
     */
    protected Collection $courses;

    public function __construct(
        protected Profile $profile,
        protected ?string $username = null,
        protected ?string $password = null,
    ) {
        $this->setPassword($password);
        $this->courses = new Collection();
    }

    public function attachCourse(Course $course): void
    {
        $this->courses->push($course);
    }

    public function detachCourse(Course $detachedCourse): void
    {
        $this->courses = $this->courses->filter(fn (Course $course) => $course->id !== $detachedCourse->id);
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(?string $password): void
    {
        $this->password = password_hash($password, PASSWORD_ARGON2I);
    }

    public function getFullName(): string
    {
        return ucwords($this->profile->firstName . ' ' . $this->profile->lastName);
    }

    public function getBirthday(): string
    {
        return $this->profile->birthdate->format('d-F-Y');
    }

    public function verifyPassword(string $password): bool
    {
        if (empty($this->password)) {
            return false;
        }

        return password_verify($password, $this->password);
    }

    public function getCourses(): Collection
    {
        return $this->courses;
    }
}
