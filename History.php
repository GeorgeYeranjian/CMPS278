<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="History.css">
    <link rel="stylesheet" href="All.css">
    <title>History</title>
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

<div id="main">
<h1 style="color:red">Tube Title</h1>
  <p style="margin-right: 20px; font-weight: bold;">History</p>
  <div class="grid-container">
      <?php
        include "connect.php";
        session_start();
        $userid=$_SESSION["id"];
        $sql="SELECT * FROM history WHERE userid='$userid' ORDER BY reg_date DESC";
        $result = $conn->query($sql);

        foreach($result as $video){
          $videoid=$video["videoid"];
          $sql1="SELECT * FROM videos WHERE id='$videoid' AND Hide=0";
          $result1 = $conn->query($sql1);

          foreach($result1 as $video1){
            ?>
            <div class="videogrid" onclick="document.location.href='watch.php?id='+<?=$video1['id']?>">
              <img src=<?= $video1["Thlocation"]?> class="thumbnail">
              <p class="title"><?= $video1["name"]?></p>
              <p class="viewcount"><?= $video1["Views"]?> views</p>
              <div class="lengthdiv">
                  <span class="lengthspan">12:20</span>
              </div>
            </div>
          <?php
          }
        }
      ?>

      
  </div>
</div>

      
      
</body>
</html>