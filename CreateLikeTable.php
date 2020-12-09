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

$sql5 = "CREATE TABLE IF NOT EXISTS `dislikes` (
    `userid` int(6) UNSIGNED,
    `videoid` int(11) NOT NULL,
    FOREIGN KEY (userid) REFERENCES auth(id),
    FOREIGN KEY (videoid) REFERENCES videos(id),
    PRIMARY KEY (userid,videoid)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$sql6 = "CREATE TABLE IF NOT EXISTS `playlists` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `owner` int(6) UNSIGNED,
    `name` VARCHAR(20) NOT NULL,
    `length` int(11) DEFAULT 0,
    FOREIGN KEY (`owner`) REFERENCES auth(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$sql7 = "CREATE TABLE IF NOT EXISTS `playlistentries` (
    `playlistid` int(11) NOT NULL,
    `videoid` int(11) NOT NULL,
    FOREIGN KEY (playlistid) REFERENCES playlists(id),
    FOREIGN KEY (videoid) REFERENCES videos(id),
    PRIMARY KEY(playlistid,videoid)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$sql8 = "CREATE TABLE IF NOT EXISTS `Channels` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `owner` int(6) UNSIGNED,
    `name` VARCHAR(20) NOT NULL,
    `Subscribers` int(225) DEFAULT 0,
     FOREIGN KEY (`owner`) REFERENCES auth(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$sql9 = "CREATE TABLE IF NOT EXISTS `subscriptions` (
    `userid` int(6) UNSIGNED NOT NULL,
    `channelid` int(11) NOT NULL,
    FOREIGN KEY (`userid`) REFERENCES auth(id),
    FOREIGN KEY (`channelid`) REFERENCES Channels(id),
    PRIMARY KEY(userid,channelid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$sql10 = "CREATE TABLE IF NOT EXISTS `views` (
    `videoid` int(11) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`videoid`) REFERENCES videos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

  // use exec() because no results are returned
  $conn->exec($sql);
  $conn->exec($sql1);
  $conn->exec($sql3);
  $conn->exec($sql4);
  $conn->exec($sql5);
  $conn->exec($sql6);
  $conn->exec($sql7);
  $conn->exec($sql8);
  $conn->exec($sql9);
  $conn->exec($sql10);
 
  echo "Table AUTH created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


?>