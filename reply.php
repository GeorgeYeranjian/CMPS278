<?php

$host = "localhost"; /* Host name */
  $user = "root"; /* User */
  $password = ""; /* Password */
  $dbname = "TUBEDB"; /* Database name */

  $con = mysqli_connect($host, $user, $password,$dbname);
  // Check connection
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
$userid=$_SESSION["id"];
$cmntid = $_POST["cmntid"];
$reply = $_POST["reply"];

$sql="INSERT INTO `reply` VALUES($userid,$cmntid,'".$reply."')";
mysqli_query($con,$sql);

echo "$cmntid";

?>