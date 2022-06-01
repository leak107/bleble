<?php

namespace App\Models;

class Player
{
    public function __construct(
        protected string $name,
        protected Character $character,
    ) { }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \App\Models\Character
     */
    public function getCharacter(): Character
    {
        return $this->character;
    }

    public function getCharacterSymbol(): string
    {
        return $this->character->value;
    }

    public function getCharacterColor(): string
    {
        return Character::getColor($this->getCharacter());
    }

}
