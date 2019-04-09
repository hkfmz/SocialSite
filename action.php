<?php 

// $host = "localhost"; 
// $user = "root";
// $pass = ""; 
// $db_name = "chat"; 

$con = mysqli_connect("localhost", "root", "", "chat");

// function formatDate($date){
// 	return date('g:i a', strtotime($date));
// }



?>

<?php
 $con = mysqli_connect("localhost", "root", "", "chat");

if(isset($_POST['submit']))
{
	$name = $_POST['userName'];
	$msg = $_POST['userMsg'];
	$query = "INSERT INTO chat SET name= '$name', msg='$msg'";
	
	$run = mysqli_query($con, $query);
	// if($run)
	// {
	// 	echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
	// }
}



?>