<?php
include 'header.php' ?>


<style type="text/css">





        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }


        .up {
  width: 45%;
  border: 1px solid #ddd ; 
  background: #fff;
  padding-top: 55px;
  padding-bottom: 55px;
  -webkit-box-shadow: 7px 6px 52px 11px rgba(191,191,191,1);
-moz-box-shadow: 7px 6px 52px 11px rgba(191,191,191,1);
box-shadow: 7px 6px 52px 11px rgba(191,191,191,1);

}


input[type=file] {
    background: #fff;
    width: 80%;
    padding: 10px;
    border: 1px solid #ddd;
}

input[type=submit] {
    background: #fff;
    width: 85%;
    padding: 10px;
    border: 1px solid #ddd;
    font-weight: bold;
}


textarea {
    background: #f2f2f2;
    width: 85%;
    padding: 10px;
    border: 1px solid #ddd;
    height: 10%;
}

   </style>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<center><div class="up"><?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "status";
$name = $_POST["username"] ;
$id2 = $_POST["id2"] ;
$propic = $_POST["propic"] ;
$link = $_POST["link"] ;
$text = $_POST["text"] ;




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO status (username, id2, propic, link, text)
VALUES ('$name', '$id2', '$propic' , '$link' , '$text')";

if ($conn->query($sql) === TRUE) {
    echo "Status has been updated";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?><a href="/"> Back to Home</div></center>