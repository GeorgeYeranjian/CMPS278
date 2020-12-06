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
         
                    $.ajax({
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
                        
                    });

    });
    $("#unlike").click(function(e){
        e.preventDefault();
         
                    $.ajax({
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
                        
                    });

    });
    $("#dislike").click(function(e){
        e.preventDefault();
                    $.ajax({
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
      


     $fetchVideos = mysqli_query($con, "SELECT location, Likes, Dislikes, Views   FROM videos WHERE id ='$id' ");
     $row = mysqli_fetch_assoc($fetchVideos);
       $location = $row['location'];
       $Likes = $row['Likes'];
       $Dislikes = $row['Dislikes'];
       $Views = $row['Views'];

      ?>
       <div >
        <video src=<?=$location?> controls width='500px' height='200px' ></video>
       <br>
       <div>
          <p>Views : <?=$Views?></p>
          <form method="post"> 
        Likes:
        <?php
          include "connect.php";
          $userid=$_SESSION["id"];
          $sql="SELECT * FROM `likes` WHERE `userid`=$userid AND videoid=$id";
          $result = $conn->query($sql);
          if($result->rowCount()==0){?>
            <input type="submit" name="like" id="like"
                class="button" value=<?=$Likes?> /> 
          <?php
          }
          else{?>
            <input style="background-color:blue" type="submit" name="unlike" id="unlike"
                class="button" value=<?=$Likes?> /> 
          <?php
          }
        ?>
        &nbsp;Dislikes:
        <input type="submit" name="dislike" id="dislike"
                class="button" value=<?=$Dislikes?> /> 
    </form>
        
      </div>
       </div>
      
        </div>
        <div id="suggested_div"></div>
        <script>
            $(function(){
              $("#suggested_div").load("suggested.html");
            });
            </script>
    </body>
</html>