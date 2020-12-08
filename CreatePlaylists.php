<?php
  session_start();
  $id=$_SESSION["id"];
  if(isset($_GET["name"])){
    $nameplaylist=$_GET["name"];  
    include "connect.php";
    $sql="INSERT INTO playlists(`owner`, `name`) 
    VALUES ($id,'$nameplaylist')";
    $conn->exec($sql);
  }
  header("Location:Playlists.php")
?>