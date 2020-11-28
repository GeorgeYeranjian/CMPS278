<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Change Password</title>
</head>
<body>
<div style="margin: auto; width: 10%; margin-top: 250px;">
<form action="" method="POST" id="passform">
<h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">CHANGE PASSWORD</h1>
    <label for="">Select a username</label>
    <select name="dropdown" id="usernameselect" onchange="myFunction()">
        <option selected="selected">Choose one</option>
        <?php
        
        $file = 'credentials.txt';
        $cred = file($file, FILE_IGNORE_NEW_LINES);

        for ($x = 0; $x < count($cred); $x++) {
            $newarray = explode(":",$cred[$x]);
            $cred[$x] = $newarray;
            
        }      
        
        
        // Iterating through the product array
        foreach($cred as $usernames){
            echo '<option value="'.$usernames[0].'">'.$usernames[0].'</option>';
        }
        ?>
    </select><br>
    Current Password (Edit it and press submit): <input type="text" id="pass"><br>
   
    <input type="submit" value="Submit" id="submit">
</form>
        <p id="test"></p>
    </div>
    
    <script type="text/javascript">
    $(document).ready(function() {
    $("#submit").click(function(e){
        e.preventDefault();
        var username = $("#usernameselect").val();
        var newpass  = $("#pass").val().trim();
       
                    console.log(newpass);
                    $.ajax({
                        type: "POST",
                        url: 'updatepass.php',
                        data: {username : username, password:newpass},
                        success: function(data){
                            console.log(data);
                            window.location.href = "login.html";
                        },
                        error: function(xhr,status,error){
                            console.log(error);
                        }
                        
                    });

    });
});
    function myFunction(){
                    var username = $("#usernameselect").val();
                    console.log(username);
                    $.ajax({
                        type: "POST",
                        url: 'getpassword.php',
                        data: {username : username},
                        success: function(data){
                            console.log(data);
                            var newdata = data.trim();
                            $('#pass').val(newdata);
                        }
                    });
       
    }
    </script>

</body>
</html>


