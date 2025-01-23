<?php

class Pizza {

    public $id;
    public $gusto;
    public $prezzo;
    public $disponibilita;

    public function __construct(string $gusto, int $prezzo, bool $disponibilita, int $id = null){
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
        $this->disponibilita = $disponibilita;
        $this->id = $id;
    }


}