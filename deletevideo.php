<?php
    $videoid=$_GET["id"];
    include "connect.php";
    $sql="DELETE FROM videos WHERE id=$videoid";
    $conn->exec($sql);


    header("Location: Admin.php");
?>