<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="watch.css"> 
        <link rel="stylesheet" href="All.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Edit</title>
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
session_start();
$userid=$_SESSION["id"];
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "TUBEDB"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}
$videoid = $_GET["videoid"];
$channelid= $_GET["channelid"];
$sql="SELECT  name FROM videos WHERE id=$videoid;";                     
$result = $con->query($sql);
$row = $result->fetch_assoc();


?>



        <div style="padding-left:10%">
        <h1>Edit vid</h1>

        <form action="Editvidpost.php?videoid=<?=$videoid?>&channelid=<?=$channelid?>" method="POST" enctype="multipart/form-data">
           Edit : <input type="text" name="name" id="name" value="<?=$row["name"]?>"><br>
           New Thumbnail :<input type="file" id="myFile" name="file">
           <button type="submit">Create</button>
           
        </form>
        
    </div>
        </div>


</body>

</html>