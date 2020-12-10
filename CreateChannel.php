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



        <div style="padding-left:10%">
        <h1>CREATE A NEW CHANNEL</h1>

        <form action="CreateChannel.php" method="POST" enctype="multipart/form-data">
           New Channel Name : <input type="text" name="name" id="name"><br>
           Channel Picture: <input type="file" id="myFile" name="file">
           <button type="submit">Create</button>
           
        </form>
        
    </div>
        </div>

        <?php

            if(isset($_POST["name"])){
               
                session_start();
                $userid=$_SESSION["id"];
                $Channelname = $_POST["name"];
                $host = "localhost"; /* Host name */
                $user = "root"; /* User */
                $password = ""; /* Password */
                $dbname = "TUBEDB"; /* Database name */

                $con = mysqli_connect($host, $user, $password,$dbname);
                // Check connection
                if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
                }
                $query="INSERT INTO Channels(`owner`,`name`) VALUES($userid,'".$Channelname."')";                     
                mysqli_query($con,$query);
                // header("Location: watch.php?id=".$videoid."");
                
                $maxsize = 5242880; // 5MB
                
                $name = $_FILES['file']['name'];
                $target_dir = "Uploadedfiles/";
                $target_file = $target_dir . $_FILES["file"]["name"];
            

                // Select file type
                $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Valid file extensions
                $extensions_arr = array('jpg','png','jpeg','gif');

                // Check extension
                if( in_array($videoFileType,$extensions_arr) ){

                // Check file size
                if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record
                    $query = "UPDATE channels
                    SET Channelimage='$target_file'
                    WHERE id= (SELECT MAX(id) FROM channels);";

                    mysqli_query($con,$query);
                    echo "Upload successfully.";
                    header("Location: ChooseChannel.php");
                    }
                }

                }else{
                echo "Invalid file extension.";
                }

            } 

            

        ?>

</body>

</html>