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
  $sql = "CREATE TABLE IF NOT EXISTS `likes` (
    `userid` int(6) UNSIGNED,
    `videoid` int(11) NOT NULL,
    FOREIGN KEY (userid) REFERENCES auth(id),
    FOREIGN KEY (videoid) REFERENCES videos(id),
    PRIMARY KEY (userid,videoid)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

  $sql1 = "CREATE TABLE IF NOT EXISTS `history` (
    `userid` int(6) UNSIGNED,
    `videoid` int(11) NOT NULL,
    FOREIGN KEY (userid) REFERENCES auth(id),
    FOREIGN KEY (videoid) REFERENCES videos(id),
    PRIMARY KEY (userid,videoid),

    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$sql3 = "CREATE TABLE IF NOT EXISTS `watchlater` (
  `userid` int(6) UNSIGNED,
  `videoid` int(11) NOT NULL,
  FOREIGN KEY (userid) REFERENCES auth(id),
  FOREIGN KEY (videoid) REFERENCES videos(id),
  PRIMARY KEY (userid,videoid),

  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";


$sql4 = "CREATE TABLE IF NOT EXISTS `Comments` (
  `userid` int(6) UNSIGNED,
  `videoid` int(11) NOT NULL,
  `comment` TINYTEXT NULL,
  FOREIGN KEY (userid) REFERENCES auth(id),
  FOREIGN KEY (videoid) REFERENCES videos(id),

  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

  // use exec() because no results are returned
  $conn->exec($sql);
  $conn->exec($sql1);
  $conn->exec($sql3);
  $conn->exec($sql4);
 
  echo "Table AUTH created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


?>