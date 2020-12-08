<?php
    $videoid= $_GET["id"];
    $playlistid= $_GET["playlistid"];
    include "connect.php";
    $sql="INSERT INTO playlistentries(`playlistid`, `videoid`) VALUES ($playlistid,'$videoid')";
    $conn->exec($sql);

    $query = "UPDATE playlists SET length = length + 1 WHERE id= $playlistid";

    $conn->exec($query);
?>