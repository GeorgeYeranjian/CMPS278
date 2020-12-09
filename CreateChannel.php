<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="watch.css"> 
        <link rel="stylesheet" href="All.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Watch</title>
    </head>
    <body>
        
<!--Navigation bar-->
<div id="nav-placeholder">



</div>

<script >
  $(function(){
  $("#nav-placeholder").load("menu.html");
});
</script>



        <div style="padding-left:10%">
        <h1>CREATE A NEW CHANNEL</h1>

        <form action="CreateChannel.php" method="POST">
           New Channel Name : <input type="text" name="name" id="name">
           <button type="submit">Create</button>
        </form>
        </div>

        <?php

            if(isset($_POST["name"])){
               
                session_start();
                $userid=$_SESSION["id"];
                $Channelname = $_POST["name"];
                $host = "localhost"; /* Host name */
                $user = "root"; /* User */
                $password = ""; /* Password */
                $dbname = "TUBEDB"; /* Database name */

                $con = mysqli_connect($host, $user, $password,$dbname);
                // Check connection
                if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
                }
                $query="INSERT INTO Channels(`owner`,`name`) VALUES($userid,'".$Channelname."')";                     
                mysqli_query($con,$query);
                // header("Location: watch.php?id=".$videoid."");
                

            }

        ?>

</body>

</html>