<?php
    $Channelid=$_GET["channelid"];
    include "connect.php";
    $sql="DELETE FROM Channels WHERE id=$Channelid";
    $conn->exec($sql);


    header("Location: ChooseChannel.php");
?>