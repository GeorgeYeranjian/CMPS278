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
        if(isset($_GET["channelid"])){
            $channelid= $_GET["channelid"];
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

            $sql = "SELECT * FROM Channels WHERE id=$channelid";
            $result = $con->query($sql);
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                ?>
                        <div>
                        <p>Subscribers: <?=$row["Subscribers"]?></p>
                    <?php
                                
                                }
                            } else {
                                echo "0 comments";
                            }
                            
                            $con->close();
                            
                            ?>
                                My videos:
                                <?php
       
                                    include "connect.php";
                                        
                                    
                                        $sql="SELECT * FROM videos WHERE channelid='$channelid' ";
                                        $result = $conn->query($sql);
                                        foreach($result as $video1){
                                            ?>
                                            <div class="videogrid">
                                            <img src=<?= $video1["Thlocation"]?> class="thumbnail">
                                            <p class="title"><?= $video1["name"]?></p>
                                            <p class="viewcount"><?= $video1["Views"]?> views / <?=$video1["Likes"]?> Likes / <?=$video1["Dislikes"]?> Dislikes</p>
                                            <div class="lengthdiv">
                                                <span class="lengthspan">12:20</span>
                                            </div>
                                            </div>
                                        <?php
                                        }
                                        
                                    ?>

                    
                        </div>
                        <?php
                    ?>

                
                
                    
                    
                
                    

               


       
    

    <?php
        }
    ?>
   </div> 
</body>
</html>