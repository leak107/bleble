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
               Your name please, before we start playing. I am
           </span>
        HTML
        );

        render(<<<HTML
            <p>
                Hello {$name}!, You are $symbol
            </p>
        HTML
        );

        return $name;
    }
}
