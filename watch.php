<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="watch.css"> 
        <link rel="stylesheet" href="All.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        
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
  $query1="INSERT INTO views(videoid) VALUES($id)";

  session_start();
  $userid=$_SESSION["id"];
  $query2="INSERT INTO history(`userid`,`videoid`) VALUES($userid,$id) ON DUPLICATE KEY UPDATE reg_date = CURRENT_TIMESTAMP";





mysqli_query($con,$query);
mysqli_query($con,$query1);
mysqli_query($con,$query2);

?>


<script type="text/javascript">
// $(function(){
//   $("#nav-placeholder").load("menu.html");
// });
// window.onload = function(){document.getElementById("reply").addEventListener("click",reply);};

var counter = 0;
var counter2=0;
function reply(id){
    if(counter==0){
    var reply = document.createElement("input");
    reply.id="replytext"+counter2;
    
    var cmntid = id;
    document.getElementById(cmntid).appendChild(reply);
    counter++;
    }
    else{
        counter=0;
        var reply = document.getElementById("replytext"+counter2).value;
        var cmntid = id;
        $.ajax({
                        type: "POST",
                        url: 'reply.php?id=<?=$userid?>',
                        data: {reply:reply , cmntid: cmntid, counter2:counter2 },
                        success: function(data){
                            console.log(data);
                            $("#"+data).append("<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
                           
                            $("#"+data).append(reply);
                            $("#reply").css("display", "none");
                            console.log(counter2);
                            $("#replytext0").css("display", "none");
                          
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });counter2++;

    };
    }


$(document).ready(function() {
    $("#like").click(function(e){
        e.preventDefault();         
                    $.ajax({
                        type: "POST",
                        url: 'like.php?id=<?=$id?>',
                        data: { },
                        success: function(data){
                            console.log(data);
                            $('#unlike').val(data);
                            $("#like").css("display", "none");
                            $("#unlike").css("display", "inline-block");
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
                            $("#unlike").css("display", "none");
                            $("#like").css("display", "inline-block");
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
                            $('#undislike').val(data);
                            $("#dislike").css("display", "none");
                            $("#undislike").css("display", "inline-block");
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });

    });
    $("#undislike").click(function(e){
        e.preventDefault();
                   
                    $.ajax({
                        type: "POST",
                        url: 'undislike.php?id=<?=$id?>',
                        data: {},
                        success: function(data){
                            console.log(data);
                            $('#dislike').val(data);
                            $("#undislike").css("display", "none");
                            $("#dislike").css("display", "inline-block");
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });

    });
    $("#flag").click(function(e){
        e.preventDefault();
                   
                    $.ajax({
                        type: "POST",
                        url: 'flag.php?id=<?=$id?>',
                        data: {},
                        success: function(data){
                            console.log(data);
                            $("#flag").css("display", "none");
                            $("#unflag").css("display", "inline-block");
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });

    });
    $("#unflag").click(function(e){
        e.preventDefault();
                   
                    $.ajax({
                        type: "POST",
                        url: 'unflag.php?id=<?=$id?>',
                        data: {},
                        success: function(data){
                            console.log(data);
                            $("#unflag").css("display", "none");
                            $("#flag").css("display", "inline-block");
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });

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
      


     $fetchVideos = mysqli_query($con, "SELECT name,location, Channelid, Likes, Dislikes,author, videodesc, Views, DATE_FORMAT(reg_date,'%Y-%m-%d') reg_date   FROM videos WHERE id ='$id' ");
     $row = mysqli_fetch_assoc($fetchVideos);
       $name=$row["name"];
       $location = $row['location'];
       $Likes = $row['Likes'];
       $Dislikes = $row['Dislikes'];
       $Views = $row['Views'];
       $Date= $row["reg_date"];
       $channelID=$row["Channelid"];
     
        $authorId=$row["author"];
        $sql1="SELECT * FROM channels WHERE id=$channelID";
        $result1=$con->query($sql1);
        $idarray2 = mysqli_fetch_array($result1);
        $author = $idarray2["name"];
                
       $videodesc = $row["videodesc"];

        $sql2="SELECT * FROM flags WHERE videoid=$id AND userid=$userid";
        $result2=$con->query($sql2);
        

      ?>
       <div>
        <video src=<?=$location?> controls width='750px' height='500px' ></video>
        
       <br>
       
       <div>
         
          <h1 style="display:inline-block"><?=$name?></h1>
            <?php
            if(mysqli_num_rows($result2)==0){
            ?>
                <input id="flag" type="submit" value="Flag"/>
                <input id="unflag" type="submit" value="Unflag" style="background-color:indianred" hidden/>
            <?php
            }
            else{
            ?>
                <input id="flag" type="submit" value="Flag" hidden/>
                <input id="unflag" type="submit" value="Unflag" style="background-color:indianred" />
            <?php
            }
        ?>


          <div style="height:80px; border:1px solid red;width:37%">
            <img style="height:100%;width:150px;float:left" src="<?=$idarray2["Channelimage"]?>" alt="">
            <br><p onclick="document.location.href='ChannelVisit.php?id='+<?=$channelID?>" style="margin-left:5px;color:blue;display:inline-block">Uploaded By: <?=$author?></p>
            <?php
                include "connect.php";
                $subsql="SELECT * FROM subscriptions WHERE userid=$userid AND channelid=$channelID";
                $result=$conn->query($subsql);
                if($result->rowCount()==1){
                    ?>
                    <input id="subscribe" type="submit" value="Subscribe" hidden/>
                    <input id="unsubscribe" type="submit" style="background-color:lightblue" value="Unsubscribe"/>
                    
                    <?php
                }
                else{
                    ?>
                    <input id="subscribe" type="submit" value="Subscribe"/>
                    <input id="unsubscribe" type="submit" value="Unsubscribe" style="background-color:lightblue" hidden/>
                    <?php
                }
                
            ?>


            <script>
                $("#subscribe").click(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: 'Subscribe.php?id=<?=$channelID?>',
                        data: {},
                        success: function(data){
                            console.log(data);
                            $("#subscribe").css("display", "none");
                            $("#unsubscribe").css("display", "inline-block");
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });
                });
                $("#unsubscribe").click(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: 'Unsubscribe.php?id=<?=$channelID?>',
                        data: {},
                        success: function(data){
                            console.log(data);
                            $("#unsubscribe").css("display", "none");
                            $("#subscribe").css("display", "inline-block");

                            
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });
                });
            </script>
            

            
          </div>
          <p>Views : <?=$Views?> </p> 
          <p>Date uploaded : <?=$Date?></p>
          <p>Description: <?=$videodesc?></p>
          Add to playlist:
          <select id="playlistselect">
            <?php
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
            <input style="background-color:blue" type="submit"id="unlike"
                value=<?=$Likes?> hidden/> 
            
          <?php
          }
          else{?>
            <input id="like" type="submit" value=<?=$Likes?> hidden/>
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
            <input style="background-color:red" type="submit" id="undislike"
                value=<?=$Dislikes?> hidden/>
          <?php
          }
          else{?>
            <input id="dislike" type="submit" value=<?=$Dislikes?> hidden/> 
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
             <div id="<?=$row['id']?>">
            <img src="Uploadedfiles/prof.png" alt="" height=20px >
            <?php
                $commentUserId=$row["userid"];
                $sql1="SELECT Username FROM auth WHERE id=$commentUserId";
                $result1=$con->query($sql1);
                $idarray = mysqli_fetch_array($result1);
                ?>
                <span><?=$idarray["Username"]?>: <?=$row["comment"]?></span>
                <button id="reply" name="<?=$row['id']?>" onclick="reply(<?=$row['id']?>)">Reply</button>

                <?php
                $commentid = $row["id"];
                 $sql3 = "SELECT * FROM reply WHERE commentid=$commentid";
                 $result3 = $con->query($sql3);
                 if ($result3->num_rows > 0) {
                    // output data of each row
                    while($row3 = $result3->fetch_assoc()) {
                        ?>

                        <div>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="Uploadedfiles/reply.png" style="height:20px; width:20px"><?=$row3["reply"]?> </p>
                        </div>

                        <?php
                    }

                }
            ?>
            </div>
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