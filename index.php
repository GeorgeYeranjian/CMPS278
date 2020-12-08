<?php
    session_start();
    if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
        header("location:home.php");

    }
    else{
        header("location:login.php");
    }
?>