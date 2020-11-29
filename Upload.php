<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TUBEDB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS `videos` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `location` varchar(255) NOT NULL,
    `Likes` int(11),
    `Dislikes` int(11),
    `Views` int(11),
    `Duration` int(11),

    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table AUTH created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "TUBEDB"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
    $maxsize = 5242880; // 5MB
    
    $name = $_FILES['file']['name'];
    $target_dir = "Uploadedfiles/";
    $target_file = $target_dir . $_FILES["file"]["name"];
   

    // Select file type
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

    // Check extension
    if( in_array($videoFileType,$extensions_arr) ){

       // Check file size
       if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
         echo "File too large. File must be less than 5MB.";
       }else{
         // Upload
         if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
           // Insert record
           $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

           mysqli_query($con,$query);
           echo "Upload successfully.";
         }
       }

    }else{
       echo "Invalid file extension.";
    }

  } 


// if (isset($_POST['submit'])){
//     $file = $_FILES['file'];
//     $fileName = $_FILES['file']['name'];
//     $fileTmpName = $_FILES['file']['tmp_name'];
//     $fileSize = $_FILES['file']['size'];
//     $fileError = $_FILES['file']['error'];
//     $fileType = $_FILES['file']['type'];

//     $fileExt = explode('.', $fileName);
//     $fileActualExt = strtolower(end($fileExt));

//     $allowed = array('mp4','png','jpg');

//     if(in_array($fileActualExt, $allowed)){
//         if ($fileError === 0 ) {
//             if ($fileSize < 100000000) {
//                 $fileNameNew = $fileName.".". $fileActualExt;
//                 $fileDestination = 'Uploadedfiles/' .$fileNameNew;

//                 move_uploaded_file($fileTmpName, $fileDestination);
//                 header("Location: Upload.html?uploadsuccess");
                
//             }
//             else{
//                 echo "file too big";
//             }
//         }
//         else{
//             echo "There was an error";
//         }
//     }
//     else{
//         echo "you cannot upload files of this type!";
//     }

// }
?>
