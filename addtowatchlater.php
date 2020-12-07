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
    $userid = $_GET['userid'];
    $videoid = $_GET['videoid'];



  $query="INSERT INTO watchlater(`userid`,`videoid`) VALUES($userid,$videoid)";





mysqli_query($con,$query);


header("Location: Home.php?userid=".$userid."");
?>