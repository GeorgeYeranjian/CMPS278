<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php

            $file= 'credentials.txt';
            $cred = file($file, FILE_IGNORE_NEW_LINES);
          
            for ($x = 0; $x < count($cred); $x++) {
                $newarray = explode(":",$cred[$x]);
                $cred[$x] = $newarray;
                
            }        
            
            $flagok=0;

            if(isset($_GET['Username']) AND isset($_GET['Password'])){
                $username = $_GET['Username'];
                $password = $_GET['Password'];
                
                for ($x = 0; $x < count($cred); $x++) {
                    if($cred[$x][0]==$username AND $cred[$x][1]==$password){
                        echo "Welcome $username";
                        header("Location: http://localhost/myproject/Home.html");
                        $flagok++;
                    }
                    
                 }
            }

            if($flagok ==0){
                echo  "Worng password";
            }
              


?>
</body>
</html>


