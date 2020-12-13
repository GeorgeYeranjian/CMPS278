<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Upload.css">
    <link rel="stylesheet" href="All.css">
    <title>Upload Video</title>
</head>
<body>

<!--Navigation bar-->
<div id="nav-placeholder">

</div>

<script>
$(function(){
  $("#nav-placeholder").load("menu.html");
});
</script>
<!--end of Navigation bar-->
<div id="main">
    <h1 style="color:red ; font-size: 30px;">278 Tube </h1>
<p style="margin-right: 20px; font-weight: bold;">UPLOAD VIDEO</p>

    <div id="uploadbox">
        <p>Click on the "Choose File" button to upload a file:</p>
        
        <form action="Upload.php" method="POST" enctype="multipart/form-data" style=" display: inline-block;">
           Name of your video: <input type="text" name="videoname" required><br><br>
           Video description: <textarea name="videodesc" id="videodesc" cols="30" rows="2"></textarea><br>
           Choose a Channel to upload from : <select id="channels" name="channelid" required oninvalid="this.setCustomValidity('Please Create a Channel first')">
            <?php
             session_start();
                include "connect.php";
                $userid=$_SESSION["id"];
                $sql1="SELECT * FROM channels WHERE `owner`=$userid";
                $result = $conn->query($sql1);
                foreach($result as $channels){
                    ?>
                    <option value="<?=$channels["id"]?>"><?=$channels["name"]?></option>
                    <?php
                }
            ?>
          </select>
        <input type="file" id="myFile" name="file">
        <button type="submit" name="submit" id="submit">Upload</button>

        </form>
    </div>
</div>
    </body>
</html>