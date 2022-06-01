<?php

namespace App\Actions;

use App\Kinds\Container;
use App\Models\Character;
use App\Models\Player;

use function Termwind\ask;
use function Termwind\render;

class RegisterPlayer
{
    public function __invoke(Container\Game $game): void
    {
        $game->addPlayer(new Player($this->collectInputName(1, Character::CIRCLE->value), Character::CIRCLE));
        $game->addPlayer(new Player($this->collectInputName(2, Character::CROSS->value), Character::CROSS));
    }

    private function collectInputName(int $playerNumber, string $symbol): ?string
    {
        $name = ask(<<<HTML
           <span class="mr-1">
               What will be your name, Player $playerNumber ?
           </span>
        HTML
        );

        render(<<<HTML
            <p>
                Hello, Player {$name}, Your symbol is $playerSymbol
            </p>
        HTML
        );

        return $name;
    }
}
