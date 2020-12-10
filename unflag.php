<?php
    $videoid=$_GET["id"];
    session_start();
    $userid=$_SESSION["id"];
    include "connect.php";

    $sql="DELETE FROM flags WHERE userid=$userid AND videoid=$videoid";
    $conn->exec($sql);

    $sql1="UPDATE videos SET Flags= Flags - 1 WHERE id = $videoid";
    $conn->exec($sql1);

?>