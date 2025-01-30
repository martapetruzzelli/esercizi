<?php
session_start();

function remove_from_cart($id){
    unset($_SESSION["cart"][$id]);
    header ( "Location:../cart.php");
}

remove_from_cart($_GET["id"]);

