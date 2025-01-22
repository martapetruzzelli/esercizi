<?php

namespace App\Models;

class Utente{

    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function saluto(): string{
        return "Ciao, mi chiamo $this->name";
    }

}
