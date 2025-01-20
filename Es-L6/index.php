<?php

class Persona {

    public $nome;
    public $cognome;
    public function __construct(string $nome, string $cognome) {
        $this->nome = $nome;
        $this->cognome = $cognome;
    }
    public function saluta(string $nome, string $cognome) :string {
        return "ciao, sono ". $nome ." ". $cognome;
    } 
}

class Docente extends Persona{
    public $skills;
    public function __construct(string $nome, string $cognome, array $skills = []) {
        parent::__construct($nome, $cognome);
        $this->skills = $skills;
    }

    

    public function presentazione(string $nome, string $cognome, array $skills = []): string{
        
        return parent::saluta($nome, $cognome) . ' e insegno ' . implode(separator: " ", array: $skills);
        
    }

}

class Studente extends Persona{
     public $materie;
     public function __construct(array $materie){
        $this->materie = $materie;
    }

    public function presentazione(string $nome, string $cognome, array $materie): string{

        return parent::saluta($nome, $cognome) . ' e studio ' . implode(separator: " ", array: $materie);
        
    }

}


$professor = new Docente('Pippo', 'Topolino', ["Storia", "Filosofia"]);

echo $professor->presentazione('Pippo', 'Topolino', ["Storia", "Filosofia"]);

echo '<br>';

$student = new Studente(materie: ["Italiano", "Matematica"]);

echo $student->presentazione("Marta", "Petruzzelli", ["italiano", "matematica"]);