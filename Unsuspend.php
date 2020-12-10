<?php
    $id=$_GET["id"];
    include "connect.php";
    $sql="UPDATE auth SET Suspended=0 WHERE id=$id ";
    $conn->exec($sql);

    header("Location: Admin.php");
?>