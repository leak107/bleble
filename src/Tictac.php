<?php

namespace App;

use App\Actions\PrintTutorial;

use function Termwind\render;
use function Termwind\terminal;

class Tictac
{
    public function __construct()
    {
        $this->actions = [
            'tutorial' => new PrintTutorial(),
        ];
    }
    

    public function run(): void
    {
        terminal()->clear();

        $this->actions['tutorial']();
    }
}
