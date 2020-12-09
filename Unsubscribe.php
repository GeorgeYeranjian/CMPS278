<?php
    try{
        $channelid=$_GET["id"];
        session_start();
        $id=$_SESSION["id"];
        include "connect.php";

        $sql="DELETE FROM subscriptions WHERE userid=$id AND channelid=$channelid";
        $conn->exec($sql);
        
        echo "Subscribed";  
    }
    catch(Exception $e){
        echo "Subscribed";
    }
?>