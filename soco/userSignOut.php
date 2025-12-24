<?php

session_start();

if($_SESSION["user"]){

    $_SESSION["user"] = null;
    session_destroy();

    echo ("1");

}
