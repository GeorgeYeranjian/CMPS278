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




<body>

<div id="nav-placeholder">



</div>
<script >
  $(function(){
  $("#nav-placeholder").load("menu.html");
});
</script>
<br><br><br>
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

    function Delete($id){
        $idd = $id;
        echo ("$idd");
    }
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           ?>
            
                <div class="videogrid" style="height:123px">
                    <div style="float:left; margin-right:10px">
                        <img src="<?= $row["Channelimage"]?>" alt="" style="height:120px" onclick="document.location.href='mychannel.php?channelid=<?=$row['id']?>'">
                    </div>
                    <div >
                    <h2 style="margin-left:10px" onclick="document.location.href='mychannel.php?channelid=<?=$row['id']?>'"><?= $row["name"]?></h2>
                    <label class="viewcount" style="Display: inline-block;"><?= $row["Subscribers"]?> Subscribers</label>
                    <button onclick="javascript:var result= confirm('Are you sure you want to delete this Channel?'); if(result){ location.href = 'Deletech.php?channelid=<?=$row['id']?>'}" > Delete</button>
                    </div>
                    
                </div>
            
            <?php
           
        }
        ?>
        <div style="border: 1px solid black;width: 50%; height:50px" onclick="document.location.href='allvideos.php'">
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