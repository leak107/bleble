<?php

namespace App\Actions;

use App\Kinds\Container;
use function Termwind\render;

class PrintProfile
{
    public function __construct(
        protected Container $container,
    ) {}

    public function __invoke(): void
    {
        render("<strong class='mt-1'>➡ Profile: </strong>");
        render($this->container->auth);
    }
}