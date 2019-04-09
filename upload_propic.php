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
Copy Text
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

<p id="myP" hidden="true">
<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            
if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            }
             else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "upload/$filename" ;
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
</p>

<center>
    <div class="up">

<p id="demo"></p>
<form method="post" action="propic_posted.php">
<input type="text" hidden="true" name="id" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>">

<input type="text" hidden="true" name="link" value="" id="link">
<input type="submit" name="submit">
</form>

</div></center>

<script>

    var x = document.getElementById("myP").innerHTML;
    document.getElementById("link").value = x ;
</script>

<script>

    var x = document.getElementById("myP").innerHTML;
    document.getElementById("demo").innerHTML = "<img src='" + x +"' height='140'>";
</script>


