
<?php
include 'header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>


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


.reg {
    background: #fff;
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
}

   </style>
</head>


<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center><div class="up">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h2>Upload Image</h2>
        
        <input type="file" name="photo" id="fileSelect"><br><br>
        <input type="submit" name="submit" value="Upload">
        <b><p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p></b>
    </form></div></center>
</body>
</html>


