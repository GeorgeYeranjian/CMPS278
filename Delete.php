<?php
    session_start();
    $userid=$_SESSION["id"];
    $Channelname = $_POST["name"];
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "TUBEDB"; /* Database name */

    $con = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
    }
    $videoid = $_GET["videoid"];
    $channelid= $_GET["channelid"];
    $query="DELETE FROM videos WHERE id=$videoid;";                     
    mysqli_query($con,$query);
    header("Location: mychannel.php?channelid=$channelid");
 

?>