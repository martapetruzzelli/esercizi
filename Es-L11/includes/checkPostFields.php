<?php

if(!$avaiablePostValues) {
    throw new Exception('Missing array for post values');
}

foreach($avaiablePostValues as $key) {
    if(!isset($_POST[$key]) || (empty($_POST[$key]) && !gettype($_POST[$key]) == 'bool')) {
        // header('Location: add.php');
        throw new Exception('Missing ' . $key);
    }
    $$key = $_POST[$key];
}