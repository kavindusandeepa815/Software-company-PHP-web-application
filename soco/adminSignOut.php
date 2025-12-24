<?php

session_start();

if($_SESSION["admin"]){

    $_SESSION["admin"] = null;
    session_destroy();

    echo ("1");

}
