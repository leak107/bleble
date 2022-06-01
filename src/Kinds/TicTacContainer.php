<?php
namespace App\Kinds;

use App\Kinds\Container\Auth;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Collection;

class TicTacContainer
{
    /**
     * @var \Illuminate\Support\Collection<int, \App\Models\Lecturer>
     */
    public Collection $players;

    public function __construct()
    {
        $this->players = new Collection();
    }

    private static ?TicTacContainer $instance = null;

    public static function getInstance(): TicTacContainer
    {
        if (self::$instance === null) {
            self::$instance = new TicTacContainer();
        }

        return  self::$instance;
    }
}
