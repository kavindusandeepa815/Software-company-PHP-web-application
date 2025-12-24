<?php

session_start();

if($_SESSION["affiliate"]){

    $_SESSION["affiliate"] = null;
    session_destroy();

    echo ("1");

}
