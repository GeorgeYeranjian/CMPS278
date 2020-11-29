<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="watch.css"> 
        <link rel="stylesheet" href="All.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Watch</title>
    </head>
    <body>
        
<!--Navigation bar-->
<div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("menu.html");
});
</script>
<!--end of Navigation bar-->

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
?>

        <div id="frame_div">
        <!-- <iframe width="50%" height="300"
        src="https://www.youtube.com/embed/tfSS1e3kYeo">
        </iframe>
        <br>
        <h1>Title and author</h1> -->
        <?php

        $id = $_GET['id'];
      


     $fetchVideos = mysqli_query($con, "SELECT location FROM videos WHERE id ='$id' ");
     $row = mysqli_fetch_assoc($fetchVideos);
       $location = $row['location'];
 
       echo "<div >";
       echo "<video src='".$location."' controls width='500px' height='200px' >";
       echo "</div>";
    
     ?>
        </div>
        <div id="suggested_div"></div>
        <script>
            $(function(){
              $("#suggested_div").load("suggested.html");
            });
            </script>
    </body>
</html>