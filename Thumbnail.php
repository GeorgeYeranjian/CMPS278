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

<p style="margin-left: 60px; font-weight: bold;">UPLOAD THUMBNAIL</p>
    <div id="uploadbox">
        <p>Click on the "Choose File" button to upload a file:</p>
        
        <form action="Uploadth.php" method="POST" enctype="multipart/form-data" style=" display: inline-block;">
        <input type="file" id="myFile" name="file">
        <button type="submit" name="submit" id="submit">Upload</button>
        </form>
    </div>
    </body>
</html>