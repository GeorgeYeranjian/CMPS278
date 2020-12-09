<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="watch.css"> 
        <link rel="stylesheet" href="All.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Watch</title>
    </head>
    <body>
        
<!--Navigation bar-->
<div id="nav-placeholder">



</div>

<script >
  $(function(){
  $("#nav-placeholder").load("menu.html");
});
</script>

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

  $id = $_GET['id'];
  $query = "UPDATE videos
  SET Views = Views + 1 
  WHERE id= $id";

  session_start();
  $userid=$_SESSION["id"];
  $query1="INSERT INTO history(`userid`,`videoid`) VALUES($userid,$id) ON DUPLICATE KEY UPDATE reg_date = CURRENT_TIMESTAMP";





mysqli_query($con,$query);
mysqli_query($con,$query1);

?>


<script type="text/javascript">
// $(function(){
//   $("#nav-placeholder").load("menu.html");
// });

$(document).ready(function() {
    $("#like").click(function(e){
        e.preventDefault();
        document.location.href = 'like.php?id=<?=$id?>';
         
                 /*   $.ajax({
                        type: "POST",
                        url: 'like.php?id=<?=$id?>',
                        data: { },
                        success: function(data){
                            console.log(data);
                            $('#like').val(data);
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });*/

    });
    $("#unlike").click(function(e){
        e.preventDefault();
        document.location.href = 'unlike.php?id=<?=$id?>';
         
                   /* $.ajax({
                        type: "POST",
                        url: 'unlike.php?id=<?=$id?>',
                        data: { },
                        success: function(data){
                            console.log(data);
                            $('#like').val(data);
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });*/

    });
    $("#dislike").click(function(e){
        e.preventDefault();
        document.location.href = 'dislike.php?id=<?=$id?>';

                   
                   /* $.ajax({
                        type: "POST",
                        url: 'dislike.php?id=<?=$id?>',
                        data: {},
                        success: function(data){
                            console.log(data);
                            $('#dislike').val(data);
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });*/

    });
    $("#undislike").click(function(e){
        e.preventDefault();
        document.location.href = 'undislike.php?id=<?=$id?>';

                   
                   /* $.ajax({
                        type: "POST",
                        url: 'dislike.php?id=<?=$id?>',
                        data: {},
                        success: function(data){
                            console.log(data);
                            $('#dislike').val(data);
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });*/

    });
    $("#addplaylist").click(function(e){
        e.preventDefault();
        let playlistid=document.getElementById("playlistselect");

                   
        $.ajax({
            type: "POST",
            url: 'addtoplaylist.php?id=<?=$id?>&playlistid='+playlistid.value,
            data: {},
            success: function(data){
                console.log(data);
            },
            error: function(xhr,status,error){
                console.log(error);
            }
            
        });

    });
});

                        



</script>
<!--end of Navigation bar-->

<?php


// if(array_key_exists('like', $_POST)) { 
//   like(); 
// } 

// else if(array_key_exists('dislike', $_POST)) { 
//   Dislike(); 
// } 
// function like() { 
//   $host = "localhost"; /* Host name */
//   $user = "root"; /* User */
//   $password = ""; /* Password */
//   $dbname = "TUBEDB"; /* Database name */

//   $con = mysqli_connect($host, $user, $password,$dbname);
//   // Check connection
//   if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }

//   $id = $_GET['id'];
//   $query = "UPDATE videos
//   SET likes = likes + 1 
//   WHERE id= $id";




// mysqli_query($con,$query);
// }

// function Dislike() { 
//   $host = "localhost"; /* Host name */
//   $user = "root"; /* User */
//   $password = ""; /* Password */
//   $dbname = "TUBEDB"; /* Database name */

//   $con = mysqli_connect($host, $user, $password,$dbname);
//   // Check connection
//   if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }


//   $id = $_GET['id'];
//   $query = "UPDATE videos
//   SET Dislikes = Dislikes + 1 
//   WHERE id= $id";




// mysqli_query($con,$query);
// }

?>

        <div id="frame_div">
        <!-- <iframe width="50%" height="300"
        src="https://www.youtube.com/embed/tfSS1e3kYeo">
        </iframe>
        <br>
        <h1>Title and author</h1> -->
        <?php

        $id = $_GET['id'];
      


     $fetchVideos = mysqli_query($con, "SELECT name,location, Likes, Dislikes,author, videodesc, Views, DATE_FORMAT(reg_date,'%Y-%m-%d') reg_date   FROM videos WHERE id ='$id' ");
     $row = mysqli_fetch_assoc($fetchVideos);
       $name=$row["name"];
       $location = $row['location'];
       $Likes = $row['Likes'];
       $Dislikes = $row['Dislikes'];
       $Views = $row['Views'];
       $Date= $row["reg_date"];
     
                $authorId=$row["author"];
                $sql1="SELECT Username FROM auth WHERE id=$authorId";
                $result1=$con->query($sql1);
                $idarray2 = mysqli_fetch_array($result1);
                $author = $idarray2["Username"];
                
       $videodesc = $row["videodesc"];

      ?>
       <div>
        <video src=<?=$location?> controls width='500px' height='200px' ></video>
       <br>
       <div>
          <h1><?=$name?></h1>
          <p>Views : <?=$Views?> </p> 
          <p>Uploaded by :<?=$author?> &nbsp;  Date uploaded : <?=$Date?></p>
          <p>Description: <?=$videodesc?></p>
          Add to playlist:
          <select id="playlistselect">
            <?php
                include "connect.php";
                $userid=$_SESSION["id"];
                $sql1="SELECT * FROM playlists WHERE `owner`=$userid";
                $result = $conn->query($sql1);
                foreach($result as $playlist){
                    ?>
                    <option value="<?=$playlist["id"]?>"><?=$playlist["name"]?></option>
                    <?php
                }
            ?>
          </select>
          <input type="submit" id="addplaylist" value="Add">
          <br><br>
          <form method="post"> 
        Likes:
        <?php
          $userid=$_SESSION["id"];
          $sql="SELECT * FROM `likes` WHERE `userid`=$userid AND videoid=$id";
          $result = $conn->query($sql);
          if($result->rowCount()==0){?>
            <input id="like" type="submit" value=<?=$Likes?> /> 
          <?php
          }
          else{?>
            <input style="background-color:blue" type="submit"id="unlike"
                value=<?=$Likes?> /> 
          <?php
          }
        ?>
        &nbsp;
        
        
        Dislikes:
        <?php
          $sql1="SELECT * FROM `dislikes` WHERE `userid`=$userid AND videoid=$id";
          $result1 = $conn->query($sql1);
          if($result1->rowCount()==0){?>
            <input id="dislike" type="submit" value=<?=$Dislikes?> /> 
          <?php
          }
          else{?>
            <input style="background-color:red" type="submit" id="undislike"
                value=<?=$Dislikes?> /> 
          <?php
          }
          ?>
            <div style="display:inline-block" onclick="shareLink()">
                <i style="margin-left:30px" class="fas fa-share" id="share_icon" style="font-size: x-large;"></i>
                Share
                <script>
                    function shareLink(){
                        alert(window.location.href);
                    }
                </script>
            </div>
        <?php

        ?>
        
    </form>
    <br>
    Add a comment:
    <br>
    <form action="addcomment.php" method="GET">
          <textarea name="comment" id="comment" cols="30" rows="2"></textarea>
          <input type="submit" name="addcomment" id="addcomment"
                class="button"  value="Add Comment"/> 
                <input type="hidden" name="videoid" value ="<?=$id?>" >
                <img src="prof.png" alt="">
          
    </form>

    All comments :
    <br>
    
    <br>
    <hr>
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

    $sql = "SELECT * FROM comments WHERE videoid=$id";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           ?>
             
            <img src="Uploadedfiles/prof.png" alt="" height=20px >
            <?php
                $commentUserId=$row["userid"];
                $sql1="SELECT Username FROM auth WHERE id=$commentUserId";
                $result1=$con->query($sql1);
                $idarray = mysqli_fetch_array($result1);
                ?>
                <span><?=$idarray["Username"]?>: <?=$row["comment"]?></span>

                <?php
            ?>

            <hr>
         
            
            
           
            

            <?php
           
        }
    } else {
        echo "0 comments";
    }
    
    $con->close();
       
       ?>

          
        
      </div>
       </div>
      
        </div>

        
    </body>
</html>