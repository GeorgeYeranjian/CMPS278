<?php
    $id=$_GET["id"];
    include "connect.php";
    $sql="UPDATE auth SET Suspended=1 WHERE id=$id ";
    $conn->exec($sql);

    header("Location: Admin.php");
?>