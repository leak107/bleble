<?php

namespace App\Kinds\Container\Game;

use App\Models\Player;

class Checker
{
    public function __construct(
        protected array $state
    ) {}

    public function checkForPlayer(Player $player): bool
    {
        return $this->winByRow($player)
            || $this->winByColumn($player)
            || $this->winByAntiDiagonal($player);
    }

    private function winByRow(Player $player): bool
    {
        return collect($this->state)
            ->some(fn (array $cols) => collect($cols)
                ->every(fn (?Player $playerOnBoard) => $this->comparePlayer($playerOnBoard, $player)));
    }

    private function winByColumn(Player $player): bool
    {
        $totalColumn = 3;

        return collect(range(0, $totalColumn - 1))
            ->some(fn ($columnIndex) => collect($this->state)
                ->every(fn (array $rows) => $this->comparePlayer($rows[$columnIndex], $player)));
    }

    private function winByAntiDiagonal(Player $player): bool
    {
        $patterns = [
            [[0, 0], [1, 1], [2, 2]],
            [[0, 2], [1, 1], [2, 0]],
        ];

        return collect($patterns)
            ->some(fn($winPattern) => collect($winPattern)
                ->every(function ($position) use ($player) {
                    $playerOnBoard = $this->state[$position[0]][$position[1]];

                    return $this->comparePlayer($playerOnBoard, $player);
                }));
    }

    private function comparePlayer(?Player $playerOne, ?Player $playerTwo): bool
    {
        if ($playerOne === null || $playerTwo === null) {
            return false;
        }

        return $playerOne->getCharacterSymbol() === $playerTwo->getCharacterSymbol();
    }
}