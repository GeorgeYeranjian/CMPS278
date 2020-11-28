<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stats</title>
</head>
<body>
    
    <?php

    $counter=0;
    $counter2=0;
    $counter3=0;
    $file= 'credentials.txt';
    $cred = file($file, FILE_IGNORE_NEW_LINES);
    for ($x = 0; $x < count($cred); $x++) {
        $newarray = explode(":",$cred[$x]);
        $cred[$x] = $newarray;
            $counter++;
        }  
    
    echo "<p>There are $counter accounts</p>";
    
    for ($x = 0; $x < count($cred); $x++) {
        if(strlen($cred[$x][1])>=13){
            $counter2++;
        }
        
        elseif ($cred[$x][0]==$cred[$x][1]) {
            $counter3++;
        }
    } 

    echo "<p>There are $counter2 accounts that have passwords that are 13 characters long or more</p>";
    echo "<p>There are $counter3 accounts that have usernames having as passwords the username itself</p>";

?>
</body>
</html>

