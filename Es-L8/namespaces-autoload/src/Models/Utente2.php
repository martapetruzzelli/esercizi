<?php

namespace App\Models2;

class Utente2{

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function saluto(): string{
        return "Ciao, mi chiamo $this->name";
    }

}