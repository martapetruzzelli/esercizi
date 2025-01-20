<?php

class Libro {
    public $titolo;
    public $autore;
    public $anno;
    public $disponibilita;

    public function __construct(string $titolo, string $autore, int $anno, bool $disponibilita) {
        $this->titolo = $titolo;
        $this->autore = $autore;
        $this->anno = $anno;
        $this->disponibilita = $disponibilita;
    }


}



class Libreria{
    public $libri;
    protected $file = './libri.json';
    public function __construct(){   
        $this->libri = $this->getLibri();
    }

    public function getLibri(){
        $json = file_get_contents($this->file);
        return $json ? json_decode($json) : [];
    }

    public function mostraLibriDisponibili(): array{
        return array_filter($this->libri, function($libro){
            return $libro->disponibilita;
        });
    }

    public function cercaTitolo(string $titolo): array{
        return array_filter($this->libri, function($libro) use ($titolo){ 
            return strToLower($libro->titolo) == strToLower($titolo);
        });
    }

    public function aggiungoLibro(Libro $libro){
        array_push($this->libri, $libro);
        return file_put_contents($this->file, json_encode($this->libri));
    }

}


//var_dump($libreria1->libri);
// var_dump($libreria1->mostraLibriDisponibili());

// $libreria1->aggiungoLibro($libro1);
// var_dump($libreria1->cercaTitolo('promessi sposi'));
