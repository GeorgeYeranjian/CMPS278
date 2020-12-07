<?php

if (isset($_GET['comment'] )){
    session_start();
    $userid=$_SESSION["id"];
    $comment = $_GET['comment'];
    $videoid = $_GET['videoid'];
    
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "TUBEDB"; /* Database name */

    $con = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
    }
       
   


    $query="INSERT INTO comments(`userid`,`videoid`,`comment`) VALUES($userid,$videoid,'".$comment."')";





    mysqli_query($con,$query);


    header("Location: watch.php?id=".$videoid."");

    
}

?>