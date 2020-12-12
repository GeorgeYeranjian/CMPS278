<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Subscriptions.css">
    <link rel="stylesheet" href="All.css">
    <title>Subscriptions</title>
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
  <p style="margin-right: 20px; font-weight: bold;">Subscriptions</p>
  <div class="grid-container">

    <?php
    include "connect.php";
    session_start();
    $userid=$_SESSION["id"];
    $sql="SELECT v.Thlocation,v.id,v.Views,v.name FROM subscriptions as s,videos as v WHERE s.userid=$userid AND v.Hide=0 AND v.Channelid=s.channelid ORDER BY v.reg_date DESC";
    $result=$conn->query($sql);
    foreach($result as $video){
      ?>
      <div class="videogrid" onclick="document.location.href='watch.php?id='+<?=$video['id']?>">
          <img src=<?= $video["Thlocation"]?> class="thumbnail">
          <p class="title"><?= $video["name"]?></p>
          <p class="viewcount"><?= $video["Views"]?> views</p>
          <div class="lengthdiv">
              <!-- <span class="lengthspan">12:20</span> -->
          </div>
      </div>
      <?php
    }
    ?>
      
    
  </div>
</div>

      
      
</body>
</html>