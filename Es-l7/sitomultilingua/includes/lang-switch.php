<?php 

$lang = $_GET['lang'] ?? 'it'; //operatore di coalescenza nulla per controllare la lingua - se c'è una lingua usa quella altrimenti passa all'altra

$langs = [
    'it' => 'Italiano',
    'en' => 'English'
];
//metto tutte le lingue in un array così posso eventualmente aggiungere lingue

function selectField($fieldLang): string{
    global $lang;
    return $lang === $fieldLang ? 'selected' : '';
}

function createLangFields():string{
    global $langs;

    $fieldsArray = '';

    foreach($langs as $key => $value){
        $selected = selectField($key);
        $fieldsArray .= "<option $selected value=\"$key\">$value</option>";
    }

    return $fieldsArray;

}