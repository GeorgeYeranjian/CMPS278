<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php


            if(isset($_GET['Username']) AND isset($_GET['Password'])){
                $username = $_GET['Username'];
                $password = $_GET['Password'];
                include "connect.php";
                $sql="SELECT * FROM auth WHERE Username='$username' AND `Password`='$password'";
                $result = $conn->query($sql);
                if($result->rowCount() > 0){
                    $user=$result->fetch();
                    session_start();
                    $_SESSION["username"]=$user["Username"];
                    $_SESSION["password"]=$user["Password"];
                    $_SESSION["id"]=$user["id"];

                    header("Location: Home.php");
                }
            }
            echo "Wrong credentials";

            
              


?>
</body>
</html>


