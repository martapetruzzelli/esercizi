<?php
//inserisco i dati che ho messo quando ho creato il nuovo database
//non devono poter essere modificate quindi uso constanti
const HOSTNAME = 'localhost'; //Dove si trova il database
const DB_NAME = 'test_connessione'; // Nome del Database
const DB_USER = 'Marta'; //Nome dell'utente MySQL che accede al database
const DB_PASSWORD = 'password'; //Password dell'utente MySQL che accede al database

const DSN = 'mysql:host' . HOSTNAME . ';dbname=' . DB_NAME . ";"; // creo la costante dsn perché nel pdo non posso fare interpolazione con costanti e così inserisco costante e basta
//le costanti vanno messe FUORI dal try catch
try{
    $db = new PDO(DSN, DB_USER, DB_PASSWORD);
    //pdo effettua la connessione al db con i dati che abbiamo preparato e restituisce un oggetto che permette di dialogare col database
}catch(PDOException $e){
    echo "Error: ". $e->getMessage();
}
//dà errori precisi da nascondere al pubblico
