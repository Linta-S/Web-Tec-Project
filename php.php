<?php
 
session_start();
 
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
 
require_once "config.php";
 
 
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
     
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
             
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
             
            if(mysqli_stmt_execute($stmt)){
                
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
     
    <style>
     .login-box{
    width: 340px;
    height: 400px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 50px 30px;
}
 
h2{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 30px;

}

.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.login-box input{
    width: 50%;
    margin-bottom: 20px;
}

.login-box input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 20px;
    color: #fff;
    font-size: 20px;
}

.login-box input[type="submit"]
{
    border: none;
    outline: none;
    height: 25px;
    background: #1c8adb;
    color: #fff;
    font-size: 16px;
    border-radius: 20px;
}
.login-box input[type="submit"]:hover
{
    cursor: pointer;
    background: #39dc79;
    color: #000;
}

.login-box a{
    text-decoration: none;
    font-size: 20px;
    color: #fff;
}
.login-box a:hover
{
    color: #39dc79;
} 

.error {color: #FF0000;}    
    </style>
</head>
<body style="background-image: url(pic13.jpeg); background-size: cover;">



	<center> 
    <div class="login-box">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
       <!-- <form name="jsForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">--> 
            <form name ="jsForm"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="post"><b>
           
<p>Password</p>
<label for="password"></label>
<input type="password" id="password" name="password"
placeholder="Enter your old Password" value="<?php echo $password ?>">
<p class="o"> <?php echo $passworderr; ?></p><br><br>

<p> New Password</p>
<label for="npassword"></label>
<input type="password" id="npassword" name="npassword"
placeholder="Enter your new Password" value="<?php echo $npassword ?>">
<p class="o"> <?php echo $npassworderr; ?></p><br><br>

</b>
<input type="submit" value="submit">
        </form>
    </div>

    <p id = "errorMsg"></p>
    <!--<script>
    function myjs(){
        var a = document.getElementById("passwords").value;
         var b = document.getElementById("passwordss").value;
        if(a==""){
            document.getElementById("masseges").innerHTML="** fill up the password"
            return false;
        }

        if(a.length<6){
            document.getElementById("messeges").innerHTML="** password should be greater than or equal to 6 charecters";
            return false;
        }
        if(b==""){
            document.getElementById("masseges").innerHTML="** fill up the password Again"
            return false;
        }

    }-->
    <p id = "errorMsg"></p>
<script>
function validate(){
var isValid= false;
var username= document.forms["jsForm"]["username"].value;

 var password= document.forms["jsForm"]["password"].value;

 var npassword= document.forms["jsForm"]["npassword"].value;

if (username == "" ){
document.getElementById('errorMsg').innerHTML ="<b>Please fill up USERNAME Properly </b>";

document.getElementById('errorMsg').style.color="red";

}

 else if (password == "" ){
document.getElementById('errorMsg').innerHTML ="<b>Please fill up Password Properly </b>";

document.getElementById('errorMsg').style.color="red";

}

else if (npassword== "" ){
document.getElementById('errorMsg').innerHTML ="<b>Please fill up New Password Type Properly </b>";

document.getElementById('errorMsg').style.color="red";

}

else{
isValid = true;
}

 return isValid;
}

</script>
</body>
</html>