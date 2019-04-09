<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $sex = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }




.login {
  width: 45%;
  margin-top: 150px;
  border: 1px solid #ddd ; 
  background: #fff;
  padding-top: 55px;
  padding-bottom: 55px;
  -webkit-box-shadow: 7px 6px 52px 11px rgba(191,191,191,1);
-moz-box-shadow: 7px 6px 52px 11px rgba(191,191,191,1);
box-shadow: 7px 6px 52px 11px rgba(191,191,191,1);
Copy Text
}

input[type=text] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    background: #fff;
}
input[type=password] {
    background: #fff;
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
}

input[type=submit] {
    background: #fff;
    width: 106%;
    padding: 10px;
    border: 1px solid #ddd;
    font-weight: bold;
}


input[type=reset] {
    background: #fff;
    width: 106%;
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
   <center> <div class="login"><div class="wrapper" style="margin-left: 20%">
       <center> <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="username">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    <br>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div> <br>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div><br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit"><br><br>
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form></center>
    </div> </div>  </center> 
</body>
</html>