<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="watch.css"> 
    <link rel="stylesheet" href="All.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="watchlater.css">

    <title>My Channels</title>
</head>


<script >
  $(function(){
  $("#nav-placeholder").load("menu.html");
});
</script>

<body>

<div id="nav-placeholder">



</div><br><br>
<div style="padding-left: 5%">


    My Channels:

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

    $sql = "SELECT * FROM Channels WHERE owner=$userid";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           ?>
            
                <div class="videogrid" onclick="document.location.href='mychannel.php?channelid=<?=$row["id"]?>'">
                    <p style="margin-left:10px" class="title"><?= $row["name"]?></p>
                    <p class="viewcount"><?= $row["Subscribers"]?> Subscribers</p>
                    
                </div>
            
            <?php
           
        }
        ?>
        <div style="border: 1px solid black;width: 50%;" onclick="document.location.href='allvideos.php'">
            <p style="margin-left:10px;font-weight:bold">All Videos</p>
        </div>
        <?php

    } else {
        echo "0 Channels";
    }
    
    $con->close();
       
       ?>


   </div> 
</body>
</html>