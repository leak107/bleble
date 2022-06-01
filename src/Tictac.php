<?php

namespace App;

use App\Actions\RegisterPlayer;
use App\Actions\PrintTutorial;
use App\Kinds\TicTacContainer;
use function Termwind\render;
use function Termwind\terminal;

class Tictac
{
    protected TicTacContainer $container;

    public function __construct()
    {
        $this->container = TicTacContainer::getInstance();

        $this->actions = [
            'tutorial' => new PrintTutorial(),
            'register' => new RegisterPlayer($this->container),
        ];
    }
    

    public function run(): void
    {
        terminal()->clear();

        $this->actions['tutorial']();
        $this->actions['register']($this->container);

        var_dump($this->container->players);
    }
}
