<?php

namespace App\Kinds;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User\Profile;
use Carbon\Carbon;

/**
 * Please ignore long method in this class. it is just for seeding lol.
 */
class Seeder
{
    public function __construct(
        private Container $container
    ) {}

    public function run(): void
    {
        $this->seedLecturers();
        $this->seedCourses();
        $this->seedStudents();
    }

    private function seedLecturers(): void
    {
        $this->container->lecturers->add(new Lecturer(
            profile: new Profile('John', 'Doe', Carbon::create(1999, 10, 11)),
            username: 'john.doe',
            password: 'password',
        ));

        $this->container->lecturers->add(new Lecturer(
            profile: new Profile('Jane', 'Doe', Carbon::create(1999, 10, 11)),
            username: 'jane.doe',
            password: 'password',
        ));
    }

    private function seedCourses(): void
    {
        $this->container->courses->add(new Course(
            name: 'PHP',
            description: 'PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language. PHP is a widely-used, free, and efficient alternative to Microsoft\'s ASP.NET and Java servlets.',
            capacity: 15,
            lecturer: $this->container->lecturers->get(0),
        ));

        $this->container->courses->add(new Course(
            name: 'JavaScript',
            description: 'JavaScript is a high-level, dynamic, untyped, and interpreted programming language. It has been standardized in the ECMAScript language specification. Alongside HTML and CSS, it is one of the three core technologies of World Wide Web content production; the majority of websites employ it, and all modern Web browsers support it without the need for plug-ins. JavaScript is prototype-based with first-class functions, making it a multi-paradigm language, supporting object-oriented, imperative, and functional programming styles.',
            capacity: 15,
            lecturer: $this->container->lecturers->get(1),
        ));
    }

    private function seedStudents(): void
    {
        $this->container->students->add(new Student(
            profile: new Profile('Jul', 'Ardo', Carbon::create(1999, 10, 11)),
            username: 'julardo',
            password: 'password',
        ));

        $this->container->students->add(new Student(
            profile: new Profile('Joe', 'Nathan', Carbon::create(1999, 10, 11)),
            username: 'jonathan',
            password: 'password',
        ));

        $this->container->students->add(new Student(
            profile: new Profile('ha', 'jir', Carbon::create(1999, 10, 11)),
            username: 'hajir',
            password: 'password',
        ));

        $this->container->students->add(new Student(
            profile: new Profile('il', 'ma', Carbon::create(1999, 10, 11)),
            username: 'ilma',
            password: 'password',
        ));

        $this->container->courses->each(
            fn (Course $course) => $this->container->students->each(
                fn (Student $student) => $course->addStudent($student)));
    }
}