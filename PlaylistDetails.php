<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="History.css">
    <link rel="stylesheet" href="All.css">
    <title>Playlist Details</title>
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
  <p style="margin-right: 20px; font-weight: bold;">Playlist Details</p>
  <div class="grid-container">
      <?php
       
       include "connect.php";
        session_start();
        $userid=$_SESSION["id"];
        $playlistid=$_GET["playlistid"];
        $sql="SELECT v.Thlocation,v.id,v.Views FROM videos AS v,playlistentries AS p WHERE p.playlistid='$playlistid' AND p.videoid=v.id";
        $result = $conn->query($sql);

        foreach($result as $video){
            $videoid=$video['id'];
            ?>
            <div class="videogrid" onclick="document.location.href='watch.php?id='+<?=$videoid?>">
                <img src=<?= $video["Thlocation"]?> class="thumbnail">
                <p class="title"><?= $video["id"]?></p>
                <p class="viewcount"><?= $video["Views"]?> views</p>
                <div class="lengthdiv">
                    <span class="lengthspan">12:20</span>
                </div>
            </div>
            <?php
            
        }
      ?>

      
  </div>
</div>

      
      
</body>
</html>