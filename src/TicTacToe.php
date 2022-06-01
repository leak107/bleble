<?php

namespace App;

use App\Actions\GameLooper;
use App\Actions\RegisterPlayer;
use App\Actions\PrintTutorial;
use App\Kinds\Container;
use function Termwind\terminal;

class TicTacToe
{
    protected Container $container;

    public function __construct()
    {
        $this->container = Container::getInstance();

        $this->container->addActions('print.tutorial', new PrintTutorial());
        $this->container->addActions('register.player', new RegisterPlayer());
        $this->container->addActions('loop.game', new GameLooper());
    }

    /**
     * @throws \Throwable
     */
    public function run(): void
    {
        terminal()->clear();

        $this->container->runAction('print.tutorial');
        $this->container->runAction('register.player');
        $this->container->runAction('loop.game');
    }
}
