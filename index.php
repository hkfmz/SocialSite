
<?php include 'header.php'?>


<!DOCTYPE html>
<html>
<head> <link rel="stylesheet" href="css/style.css">
<style>

ul {
    list-style-type: none;
    padding: 0;
    width: 15%;
    position: fixed;
    height: 100%;
    overflow: auto;
    margin-top: 250px;
    padding: 10;
}

</style>
</head>
<body>
    <ul>
    <li><a href="file-upload.php"><img src="camera.png" height="50" width="50"></a></li>
    <li><a href="chat.php"><img src="chat.png" height="50" width="50"></a></li>
  <li><a href="/"><img src="home.png" height="50" width="50"></a></li>
  <li><a href="settings.php"><img src="settings.png" height="50" width="50"></a></li>
  <li><a href="logout.php"><img src="logout.jpg" height="50" width="50"></a></li>
  
</ul>


<div style="margin-left:22%;padding:1px 16px;height:1000px"><br><br><br><br><br><br><br>
  
<table><td>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "status";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, text, link, time, propic, id2  FROM status ORDER BY time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='post'><div class='pad'><table><td><img height='45' width='45' class='propic' style='border-radius: 50%' src='" .  $row["propic"] .
        "'></td><td valign='center'><font color='#03c6b6'><b><a href='profile.php?id=". $row["id2"]. "'>" . $row["username"]. "</a></b></font><br><font color='gray'><small> "  . time_elapsed_string($row["time"]) . "</small></font></td></table><br><br>" . $row["text"] . "</div><br><img src='" . $row["link"] . "' style='width: 100%'></div>";
    }
} else {
    echo "0 results";
}

$conn->close();




function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?> 
</td><td valign="middle">

</td></table>






























</div>

</body>
</html>
