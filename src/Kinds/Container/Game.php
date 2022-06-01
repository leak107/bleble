<?php

namespace App\Kinds\Container;

use App\Models\Player;
use Illuminate\Support\Collection;

class Game
{
    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Player>
     */
    protected Collection $players;

    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Player>
     */
    protected Collection $winners;

    public int $ticked = 0;

    public array $state = [
        [null, null, null],
        [null, null, null],
        [null, null, null],
    ];

    public function __construct()
    {
        $this->players = new Collection();
        $this->winners = new Collection();
    }

    public function isFinish(): bool
    {
        $this->checkWinners();

        return $this->winners->isNotEmpty() || $this->ticked === 9;
    }

    public function tick(): void
    {
        $this->ticked++;
    }

    public function addPlayer(Player $player): void
    {
        $this->players->push($player);
    }

    public function getActivePlayer(): Player
    {
        return $this->players->get($this->ticked % 2);
    }

    public function changeState(Player $activePlayer, int $cellNumber): void
    {
        // we decrement cell number by 1 because array index starts from 0
        // but game table start from 1
        $cellNumber--;

        $rowIndex = floor($cellNumber / 3);
        $columnIndex = $cellNumber % 3;

        $this->state[$rowIndex][$columnIndex] = $activePlayer;
    }

    /**
     * @return \Illuminate\Support\Collection<int, Player>
     */
    public function getWinners(): Collection
    {
        return $this->winners;
    }

    protected function checkWinners(): void
    {
        $checker = new Game\Checker($this->state);

        $this->winners = $this->players->filter(fn (Player $player) => $checker->checkForPlayer($player))->values();
    }
}