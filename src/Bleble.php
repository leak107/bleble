<?php

namespace App;

use App\Actions\PrintProfile;
use App\Actions\UserLogin;
use App\Kinds\Container;
use App\Kinds\Seeder;
use App\Models\Student;
use function Termwind\{render, ask};

class Bleble
{
    protected Container $container;
    protected ?Student $student = null;

    private array $actions;

    public function __construct()
    {
        $this->container = Container::getInstance();
        $this->actions = [
            'login' => new UserLogin($this->container),
            'profile.print' => new PrintProfile($this->container),
        ];
    }

    public function seed(): void
    {
        $seeder = new Seeder($this->container);
        $seeder->run();
    }

    public function run(): void
    {
        render('<h1 class="bg-amber-100 p-20 ">Bleble App</h1>');

        $this->actions['login']();
        $this->actions['profile.print']();
    }
}