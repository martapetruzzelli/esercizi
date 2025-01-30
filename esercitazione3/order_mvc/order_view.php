<?php

function check_order_errors(){
    echo isset($_SESSION["order_errors"]) ? $_SESSION["order_errors"] : "Order success";
}