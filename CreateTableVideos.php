<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TUBEDB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE IF NOT EXISTS `videos` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `author` varchar(255) NOT NULL,
    `Channelid` varchar(255) NOT NULL,
    `videodesc` varchar(255) NOT NULL,
    `location` varchar(255) NOT NULL,
    `Likes` int(11) DEFAULT 0,
    `Dislikes` int(11) DEFAULT 0,
    `Views` int(11) DEFAULT 0,
    `Duration` int(11),
    `Thlocation` varchar(255) NOT NULL,
    `Thname` varchar(255) NOT NULL,
    

    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table AUTH created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


?>