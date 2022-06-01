<?php

namespace App\Models;

class Player
{
    public function __construct(
        protected string $name,
        protected string $symbol,
    ) { }

}
