<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE>
<head>

<title></title>	

<link rel="stylesheet" href="css/style.css">

</head>
<body>
	

	<div class="head"><table><td><a href="/"><img src="logo.png" height="35px" style="margin-left: 100%" /></a> <td><td valign="middle"><div style="margin-left: 200%"><form>

<table><td><input style="background: #F6F6F6; border-radius: 4px; border: 1px solid #ddd ; padding: 5px" type="text" placeholder="Search" size="30"></form></td>
<td valign="middle">
<div style="margin-left: 200%"><a href="profile.php?id=<?php echo htmlspecialchars($_SESSION["id"]); ?>"><img src="<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "status";
$id = $_SESSION["id"];

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
?>" height="50" width="50" style="border-radius: 50%"></a></div>
	</td></td></table></table></div>
</body>