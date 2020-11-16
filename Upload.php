<?php


if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('mp4','png','jpg');

    if(in_array($fileActualExt, $allowed)){
        if ($fileError === 0 ) {
            if ($fileSize < 100000000) {
                $fileNameNew = $fileName.".". $fileActualExt;
                $fileDestination = 'Uploadedfiles/' .$fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: Upload.html?uploadsuccess");
                
            }
            else{
                echo "file too big";
            }
        }
        else{
            echo "There was an error";
        }
    }
    else{
        echo "you cannot upload files of this type!";
    }

}
?>
