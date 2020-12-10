<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'createdb.php';?>
    <?php include 'CreateAUTHtable.php';?>
    <?php include 'CreateTableVideos.php';?>
    <?php include 'CreateLikeTable.php';?>

    <title>Log In</title>
    
</head>
<body>
    <div style="margin: auto; width: 10%; margin-top: 250px;">
        
        <form method="GET" action="Login.php" style="display: inline-block;">
            <h1 style="color: red;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Tube Title Login</h1>

            Username <br>
            <input type="text" name="Username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br>
            Password <br>
            <input type="text" name="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
            Remember me
            <input type="radio" name="remember_me">
            <input type="submit" value="Log In"><br>
            
        </form>
        <form method="GET" action="addcredentials.php" style="display: inline-block;">
            <input type="submit" value="Sign Up">
        </form>
        <form method="GET" action="modifycredentials.php" style="display: inline-block;">
            <input type="submit" value="Change password">
        </form>
        <form method="GET" action="Admin.php" style="display: inline-block;">
            <input type="submit" value="Admin">
        </form>
    </div>
    
    <?php
        if(isset($_GET['Username']) AND isset($_GET['Password'])){
            $username = $_GET['Username'];
            $password = $_GET['Password'];
            include "connect.php";
            $sql="SELECT * FROM auth WHERE Username='$username' AND `Password`='$password'";
            $result = $conn->query($sql);
            if($result->rowCount() > 0){
                $user=$result->fetch();
                if($user["Suspended"]==1){
                    echo "Your account has been suspended.";
                }
                else{
                    session_start();
                    $_SESSION["username"]=$user["Username"];
                    $_SESSION["password"]=$user["Password"];
                    $_SESSION["id"]=$user["id"];

                    if(isset($_GET["remember_me"])){
                        setcookie('username', $username, time() + (86400 * 30), "/");
                        setcookie('password', $password, time() + (86400 * 30), "/");
                    }

                    header("Location: Home.php");
                }
                
            }
            else{
                echo "Wrong credentials.";
            }
        }
?>
    
</body>
</html>