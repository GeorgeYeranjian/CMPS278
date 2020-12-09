<?php
    try{
        $channelid=$_GET["id"];
        session_start();
        $id=$_SESSION["id"];
        include "connect.php";

        $sql="INSERT INTO subscriptions(`userid`, `channelid`) VALUES ($id,'$channelid')";
        $conn->exec($sql);
        $sql="UPDATE Channels  SET Subscribers= Subscribers + 1 WHERE id = $channelid";
        $conn->exec($sql);
        
        echo "Subscribed";  
    }
    catch(Exception $e){
        echo "Subscribed";
    }
?>