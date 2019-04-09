

<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<form action="upload2.php" method="post" enctype="multipart/form-data">
 
<table border="1" style="padding:10px">
 
<tr>
 
<Td>Upload  Video</td></tr>
 
<Tr><td><input type="file" name="fileToUpload"/></td></tr>
 
<tr><td>
 
<input type="submit" value="Uplaod Video" name="upd"/>
  
</td></tr>
 
</table>
 
</form>