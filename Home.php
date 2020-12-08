<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="All.css">
    
    <title>278 Tube</title>
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

<div id="main">
  <p style="margin-right: 20px; font-weight: bold;">Suggested Videos</p>
  <div class="grid-container">
      <?php
      session_start();
      $userid=$_SESSION["id"];
      $sql = "SELECT id, name ,Thlocation FROM videos";
      $result = $con->query($sql);
      
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $name = substr($row["name"], 0, 15);
              echo "<div id=".$row["id"].">";
              echo "<a href=". "watch.php?id=".$row["id"].">";
              echo "<img src=".$row["Thlocation"]." class="."thumbnail"."></a>";
              ?>

              <button class='btn' ><a href="addtowatchlater.php?userid=<?=$userid?>&videoid=<?=$row["id"]?>"><i class='fa fa-clock-o'></i></a></button>
              <?php
              echo "<p class="."title.".">" .$name."</p>";
              
              echo "</div>";
          }
      } else {
          echo "0 results";
      }
      
      $con->close();



      ?>
    <!-- <div>
      <a href="watch.php">
      <img src="testImage.jpg" class="thumbnail"></a>
      <p class="title"></p>
      <p class="viewcount">View Count</p>
    </div>
    <div>
      <img src="testImage.jpg" class="thumbnail">
      <p class="title">Video Title</p>
      <p class="viewcount">View Count</p>
    </div>
    <div>
      <img src="testImage.jpg" class="thumbnail">
      <p class="title">Video Title</p>
      <p class="viewcount">View Count</p>
    </div>  
    <div>
      <img src="testImage.jpg" class="thumbnail">
      <p class="title">Video Title</p>
      <p class="viewcount">View Count</p>
    </div>
    <div>
      <img src="testImage.jpg" class="thumbnail">
      <p class="title">Video Title</p>
      <p class="viewcount">View Count</p>
    </div>
    <div>
      <img src="testImage.jpg" class="thumbnail">
      <p class="title">Video Title</p>
      <p class="viewcount">View Count</p>
    </div>
    <div>
      <img src="testImage.jpg" class="thumbnail">
      <p class="title">Video Title</p>
      <p class="viewcount">View Count</p>
    </div>
    <div>
      <img src="testImage.jpg" class="thumbnail">
      <p class="title">Video Title</p>
      <p class="viewcount">View Count</p>
    </div> -->
  </div>
</div>

      
      
</body>
</html>