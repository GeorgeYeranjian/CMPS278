<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="watch.css"> 
        <link rel="stylesheet" href="All.css">
        <link rel="stylesheet" href="watchlater.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>Channel</title>
</head>


<script >
  $(function(){
  $("#nav-placeholder").load("menu.html");
});
</script>

<body>

<div id="nav-placeholder">



</div>
<div style="padding-left: 10%">
    <?php
        $channelid= $_GET["id"];
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

        $sql1= "SELECT * FROM channels WHERE id=$channelid";
        $result1 = $con->query($sql1);
        $p=$result1->fetch_assoc();
        ?>
        <h2><?=$p["name"]?></h2>
        <h3><?=$p["Subscribers"]?> subscribers</h3>
        <?php

        $sql = "SELECT * FROM videos WHERE Channelid=$channelid";
        $result = $con->query($sql);

        
    
    
        foreach($result as $video){
            $channelid
            ?>
            <div class="videogrid">
                <img src=<?= $video["Thlocation"]?> class="thumbnail">
                <p class="title"><?= $video["name"]?></p>
                <p class="viewcount"><?= $video["Views"]?> views / <?=$video["Likes"]?> Likes / <?=$video["Dislikes"]?> Dislikes</p>
                <div class="lengthdiv">
                    <span class="lengthspan">12:20</span>
                </div>
            </div>
            <?php
        }
    ?>
                
                    

               


       
    

    
   </div> 
</body>
</html>