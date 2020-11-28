<?php
    $file= 'credentials.txt';
    $cred = file($file, FILE_IGNORE_NEW_LINES);
    for ($x = 0; $x < count($cred); $x++) {
        $newarray = explode(":",$cred[$x]);
        $cred[$x] = $newarray;
    
        }   
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = 0;
        for ($x = 0; $x < count($cred); $x++) {
            if($cred[$x][0]==$username){
                $password = $cred[$x][1];
               
                
            }
        }  
        echo "$password";
    }
    ?>   