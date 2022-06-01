<?php

namespace App\Actions;

use App\Kinds\TicTacContainer;
use App\Models\Player;

use function Termwind\ask;
use function Termwind\render;

class RegisterPlayer
{
    protected array $symbol = [
        '⭕',
        '❌',
    ];

    protected $players = [];

    public function __construct(
        protected TicTacContainer $container
    ) { }
    
    public function __invoke(): void
    {
        for ($i = 0; $i < 2; $i++) {
            [$name, $symbol] = $this->collectInput($i);

            $this->container->players->add(new Player($name, $symbol)); 
        }
    }

    private function collectInput($index): ?array
    {
        $playerNumber = $index + 1;
        $playerSymbol = $this->symbol[$index];

        $name = ask(<<<HTML
           <span class="mr-1">
               What will be your name, Player $playerNumber ?
           </span>
        HTML);

        render(<<<HTML
            <p>
                Hello, Player {$name}, Your symbol is $playerSymbol
            </p>
        HTML);

        return [$name, $this->symbol[$index]];
    }
}
