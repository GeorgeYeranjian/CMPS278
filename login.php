<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'createdb.php';?>
    <?php include 'CreateAUTHtable.php';?>
    <title>Log In</title>
    
</head>
<body>
    <div style="margin: auto; width: 10%; margin-top: 250px;">
        
        <form method="GET" action="authenticate.php" style="display: inline-block;">
            <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">LOG IN</h1>

            Username <br>
            <input type="text" name="Username"><br>
            Password <br>
            <input type="text" name="Password">
            <input type="submit" value="Log In"><br>
        </form>
        <form method="GET" action="addcredentials.php" style="display: inline-block;">
            <input type="submit" value="Sign Up">
        </form>
        <form method="GET" action="modifycredentials.php" style="display: inline-block;">
            <input type="submit" value="Change password">
        </form>
    </div>
    
    
</body>
</html>