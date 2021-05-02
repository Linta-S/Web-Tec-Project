
<?php
 
session_start();
 
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
 
require_once "config.php";
 
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
   
    if(empty($username_err) && empty($password_err)){
  
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
         
            $param_username = $username;
            
        
            if(mysqli_stmt_execute($stmt)){
               
                mysqli_stmt_store_result($stmt);
                
                 
                if(mysqli_stmt_num_rows($stmt) == 1){                    
              
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                    
                            header("location: welcome.php");
                        } else{
                             
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

       
            mysqli_stmt_close($stmt);
        }
    }
    
 
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
     <script defer src="script.js" ></script>
    <style>
    .login-box{
    width: 340px;
    height: 450px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 50px 30px;
     font-size: 18px;
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
    height: 35px;  //buttonsize
    background: #1c8adb;
    color: #FF0000;  //white
    font-size: 20px;
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
    color: #39dc79;//green
} 

.error {color: #FF0000;}  //red  
    </style>
</head>
<body style="background-image: url(pic12.jpeg); background-size: cover;">
<div id="errors"></div>
    <center>
    <div class="login-box">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <br>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form onsubmit ="return validation()"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <br>
                <span class="error"> * <?php echo $username_err; ?></span>
                <span id="messages2" style="color:pink;" ></span>
            </div>  

       
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <br>
                <span class="error"> * <?php echo $password_err; ?></span>
                <span id="messages3" style="color:green;" ></span>
                <br>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
<script>
 function validation(){
  
  var username=document.getElementById('username').value;
  var password=document.getElementById('password').value;
   
    
 if(username == ""){
    document.getElementById("messages2").innerHTML ="** please fill the  username";
    return false;

 }  
 else if(password == ""){
    document.getElementById("messages3").innerHTML ="** please fill the   password";
    return false;

 }  
  
  
} 
</script>

</body>
</html>