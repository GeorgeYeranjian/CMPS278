<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="watch.css"> 
        <link rel="stylesheet" href="All.css">
        <link rel="stylesheet" href="watchlater.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <title>My Channel</title>
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

        if(isset($_GET["top"])){
            $top=$_GET["top"];
            if($top=="overall"){
                $sql1 = "SELECT * FROM videos WHERE author=$userid ORDER BY Views DESC";
            }
            elseif($top=="hours"){
              //  $sql1 = "SELECT * FROM videos,views WHERE videos.author=$userid views.videoid=videos.id ORDER BY COUNT(views.reg_date)";
              $sql1 = "SELECT * FROM videos WHERE author=$userid ORDER BY Views DESC";
            }
        }
        else{
            $sql1 = "SELECT * FROM videos WHERE author=$userid";
        }

        
                
        ?>
        <h2>My Videos</h2>


        <?php
        $sql="SELECT COUNT(views.videoid) as total FROM videos,views WHERE views.videoid=videos.id AND videos.author=$userid";
        $result=$con->query($sql);
        $views=$result->fetch_assoc()["total"];
        ?>
        
            <p>Total Views: <?=$views?></p>
            <p>Total Views last month: <?=$views?></p>
        <?php
      //  $sql2="SELECT COUNT(views.videoid) as total FROM videos,views WHERE views.videoid=videos.id AND videos.author=$userid AND datetime(views.reg_date) = '2020-12-09 19:39:47'";
      //  $result2=$con->query($sql2);
         //AND DATE(views.reg_date) <= getdate()
        ?>
        <form action="allvideos.php">
            Top Videos:
            <select name="top" id="top">
                <option value="hours">48 Hours</option>
                <option value="overall">Overall</option>
            </select>
            <input type="submit" value="Apply">
        </form><br>
        <?php

        
        $result1 = $con->query($sql1);
        ?>
        <?php
        foreach($result1 as $video){
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