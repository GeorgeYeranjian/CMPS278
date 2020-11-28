<?php
   
     $file= 'credentials.txt';
     $cred = file($file, FILE_IGNORE_NEW_LINES);
     for ($x = 0; $x < count($cred); $x++) {
         $newarray = explode(":",$cred[$x]);
         $cred[$x] = $newarray;
     
         }   
     if(isset($_POST['username']) AND isset($_POST['password'])){

    
         $username = $_POST['username'];
         $password = $_POST['password'];
         for ($x = 0; $x < count($cred); $x++) {
             if($cred[$x][0]==$username){
                $cred[$x][1]= $password;
                
                 
             }
         }  
         print_r($cred);

         file_put_contents("credentials.txt", "");
        $fp = fopen('credentials.txt', 'a');//opens file in append mode
         for ($x = 0; $x < count($cred)-1; $x++) {

            fwrite($fp,  $cred[$x][0] . ':' . $cred[$x][1].PHP_EOL );
            }
            fwrite($fp,  $cred[count($cred)-1][0] . ':' . $cred[count($cred)-1][1] );
              fclose($fp);
     }
?>