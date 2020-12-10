<?php
    $videoid=$_GET["videoid"];
    include "connect.php";


    $sql1="UPDATE videos SET Hide= 1 WHERE id = $videoid";
    $conn->exec($sql1);

    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>