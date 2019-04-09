<title><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_reg";
$id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["username"];
    }
} else {
    echo "Error Page";
}

$conn->close();
?></title>


<?php
include 'header.php'?>




<br><br><br><br><br><br><br><br>


<center><table><img src="
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "status";
$id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT link, time FROM propic WHERE id = $id ORDER BY time DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["link"];
    }
} else {
    echo "blank.png";
}

$conn->close();
?>" height="180px" class="propic2" width="180px" style="background: #fff; padding : 2px; border: 2px solid #03c6b6; border-radius: 50%; height: 180px;
  width : 180px;
  margin-right: 4px"/><br><br>



<font size="5"><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_reg";
$id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["username"];
    }
} else {
    echo "Error Page";
}

$conn->close();
?> </font></table></center>



<br><br>


<div style="margin-left: 30%">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "status";
$id = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username, text, link, time, propic, id2  FROM status WHERE id2 = $id ORDER BY time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='post2'><div class='pad'><table><td><img height='45' width='45' class='propic' style='border-radius: 50%' src='" .  $row["propic"] .
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
</div>