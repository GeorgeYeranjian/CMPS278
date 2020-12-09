<?php

if(isset($_POST["name"])){
session_start();
$userid=$_SESSION["id"];
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "TUBEDB"; /* Database name */

$vidname = $_POST["name"];
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}

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
                    // $query = "UPDATE channels
                    // SET Channelimage='$target_file'
                    // WHERE id= (SELECT MAX(id) FROM channels);";

                    // mysqli_query($con,$query);
                    // echo "Upload successfully.";
                    
                    }
                }

                }else{
                echo "Invalid file extension.";
                }

                // $sql="SELECT  Thlocation FROM videos WHERE id=$videoid;";                     
                // $result = $con->query($sql);
                // $row = $result->fetch_assoc();


$videoid = $_GET["videoid"];

$channelid= $_GET["channelid"];
$sql="UPDATE videos SET name='".$vidname ."' WHERE id=$videoid";                     

mysqli_query($con,$sql);
header("Location: mychannel.php?channelid=$channelid");

            }

?>