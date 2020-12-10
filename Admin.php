<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>

    <body>
        
        <?php include 'connect.php';?>
        <h1>Users</h1>
        <table border="1" style="width:40%">
            <tr >
                <th style="width:50%">Username</th>
                <th style="width:50%">Suspend</th>
            </tr>    
            <?php
                $sql="SELECT * FROM auth";
                $result = $conn->query($sql);
                foreach($result as $row){
                    $id=$row["id"];
                    $Username=$row["Username"];
                    $suspend=$row["Suspended"];
                    ?>
                        <tr>
                            <td style="width:50%"> <?= $Username?> </td>
                            <?php
                                if($suspend==0){
                                    ?>
                                    <td style="width:50%">
                                        <input value="Suspend" type="submit" onclick= "document.location.href='Suspend.php?id=<?=$id?>'">
                                    </td>
                                    <?php
                                }
                                else{
                                    ?>
                                    <td style="width:50%">
                                        <input value="Unsuspend" type="submit" onclick= "document.location.href='Unsuspend.php?id=<?=$id?>'">
                                    </td>
                                    <?php
                                }
                            ?>
                            
                        </tr>
                    <?php

                }
            ?>    
        </table><br>
        <h1>Videos</h1>
        <table border="1" style="width:40%">
            <tr >
                <th style="width:25%">Video Name</th>
                <th style="width:25%">Video ID</th>
                <th style="width:25%">Flags</th>
                <th style="width:25%">Delete</th>
            </tr>    
            <?php
                $sql="SELECT * FROM videos WHERE Flags>0";
                $result = $conn->query($sql);
                foreach($result as $row){
                    $videoid=$row["id"];
                    $name=$row["name"];
                    $flag=$row["Flags"];
                    ?>
                        <tr>
                            <td style="width:25%"> <?= $name?> </td>
                            <td style="width:25%"> <?= $videoid?> </td>
                            <td style="width:25%"> <?= $flag?> </td>
                            <td style="width:25%"><input value="Delete" type="submit" onclick= "document.location.href='deletevideo.php?id=<?=$id?>'"></td>

                            
                        </tr>
                    <?php

                }
            ?>    
        </table><br>



    </body>
    
</html>