<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="playlists.css">
    <link rel="stylesheet" href="All.css">
    <title>Playlists</title>
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
  session_start();
  $id=$_SESSION["id"];
?>

<div id="main">
  <p style="margin-right: 20px; font-weight: bold;">Playlists</p>
  <form action="CreatePlaylists.php">
    Playlist name
    <input type="text" name="name">
    <input type="submit" value="Create Playlist">
  </form><br>
  <div class="grid-container">
    <?php
      include "connect.php";
      $sql1="SELECT * FROM playlists WHERE `owner`=$id";
      $result = $conn->query($sql1);
      foreach($result as $playlist){
        ?>
        <div class="videogrid" onclick="document.location.href = 'PlaylistDetails.php?playlistid=<?=$playlist['id']?>'">
          <p class="title"><?=$playlist["name"]?></p>
          <p class="viewcount"><?=$playlist["length"]?> videos</p>
        </div>
        <?php
      }
    ?>
  </div>
  <?php

  ?>

</div>

      
      
</body>
</html>