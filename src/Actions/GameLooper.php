<?php

namespace App\Actions;

use App\Kinds\Container;
use App\Models\Player;
use function Termwind\ask;
use function Termwind\render;
use function Termwind\terminal;

class GameLooper
{
    public function __invoke(Container\Game $game): void
    {
        while (! $game->isFinish()) {
            $game->tick();
            $this->render($game);
            $this->fill($game);
        }

        $this->render($game);
        $this->renderVictory($game);
    }

    protected function render(Container\Game $game): void
    {
        terminal()->clear();
        $this->renderRound($game);
        $rows = $this->renderRows($game->state);
        render("<table>$rows</table>");
    }

    protected function renderRows(array $rows): string
    {
        return collect($rows)->map(function (array $cols) {
            $renderedCols = $this->renderCols($cols);

            return "<tr border=\"1\">$renderedCols</tr>";
        })->implode('');
    }

    protected function renderCols(array $cols): string
    {
        return collect($cols)
            ->map(static function (?Player $player) {
                if (!$player) {
                    return '<td><p class="px-1 bg-gray-300 text-gray-900">-</p></td>';
                }

                $bgColor = 'bg-' . $player->getCharacterColor();
                $symbol = $player->getCharacterSymbol();

                return "<td><p class=\"px-1 $bgColor text-white\">$symbol</p></td>";
            })
            ->implode('');
    }

    protected function renderRound(Container\Game $game): void
    {
        render("<p>Round $game->ticked!<br></p>");
    }

    protected function fill(Container\Game $game): void
    {
        $activePlayer = $game->getActivePlayer();

        $characterSymbol = $activePlayer->getCharacterSymbol();
        $cellNumber = ask("<span class=\"mr-1\">Player [$characterSymbol] Which cell do you want to fill ? </span>");

       $game->changeState($activePlayer, $cellNumber);
    }

    protected function renderVictory(Container\Game $game): void
    {
        if ($game->getWinners()->count() > 1 || $game->getWinners()->isEmpty()) {
            render("<h1>It's a tie!</h1>");

            return;
        }

        /** @var Player $winner */
        $winner = $game->getWinners()->first();

        render("<h1>Player {$winner->getName()} [{$winner->getCharacterSymbol()}] won!</h1>");
    }
}