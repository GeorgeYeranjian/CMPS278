<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<div style="margin: auto; width: 10%; margin-top: 250px;">
        
        <form method="GET" action="addcredentials.php" style="display: inline-block;">
            <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">SIGN UP</h1>

            Username <br>
            <input type="text" name="Username"><br>
            Password <br>
            <input type="text" name="Password">
            <input type="submit" value="Sign Up"><br>
        </form>
        <p><a href="login.php">Go to Login Page</a></p>
         
    </div>
    <?php
            $file= 'credentials.txt';
            $cred = file($file, FILE_IGNORE_NEW_LINES);
        
            for ($x = 0; $x < count($cred); $x++) {
                $newarray = explode(":",$cred[$x]);
                $cred[$x] = $newarray;
            
                }   

        $taken = 0;

        if(isset($_GET['Username']) AND isset($_GET['Password'])){
                $username2 = $_GET['Username'];
                $password2 = $_GET['Password'];
                
                for ($x = 0; $x < count($cred); $x++) {
                    if($cred[$x][0]==$username2){
                        echo " $username is already taken";
                        $taken++;
                        
                    }
                    
                    
                 }
                 if($taken ==0){
                    $fp = fopen('credentials.txt', 'a');//opens file in append mode  
                    fwrite($fp, PHP_EOL . $username2 . ':' . $password2);    
                    fclose($fp);  
                    echo "Signed up successfully";

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "TUBEDB";
                    
                    try {
                      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                      // set the PDO error mode to exception
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                      // prepare sql and bind parameters
                      $stmt = $conn->prepare("INSERT INTO AUTH (Username, Password)
                      VALUES (:username2, :password2)");
                      $stmt->bindParam(':username2', $username2);
                      $stmt->bindParam(':password2', $password2);
                      $stmt->execute();

                    

                 }  
                 catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();
                  } 
            }
        
        }
    
    ?>
</body>
</html>
