<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name=$username = $password = $confirm_password = "";
$name_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
     
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
             
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



       // Validate Name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a  name.";
    } else{
         
        $sql = "SELECT id FROM users WHERE  name = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
             
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
        
            $param_name = trim($_POST["name"]);
            
        
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $name_err = "This username is already taken.";
                } else{
                    $name = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

     
            mysqli_stmt_close($stmt);
        }
    }
    
    
   
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
   
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    
    if(empty($name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        
        $sql = "INSERT INTO users (name,username, password) VALUES (?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
             
            mysqli_stmt_bind_param($stmt, "sss",$param_name, $param_username, $param_password);
            
       
            $param_name = $name;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
           
            if(mysqli_stmt_execute($stmt)){
               
                header("location: login.php");
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
    <title>Sign Up</title>
  <style type="text/css">
      
 .login-box{
    width: 400px;
    height: 620px;
    background: rgba(0, 0, 0, 0.5);
    color: #DAA520;
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
    padding: 0 0 10px;
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
    color: #39dc79;
}
.error {color: #fff;}

  </style>>  
     <link ref="stylesheet"  href="style.css">
</head>
<body style="background-image: url(pic12.jpeg); background-size: cover;">


 <script>
        function myjs(){
            var a= document.getElementById("name").value;
             var b= document.getElementById("username").value;
             

            if(a==""){
                document.getElementById("messages").innerHTML="**please enter name";
                return false;
            }
            if(b==""){
                document.getElementById("messages").innerHTML="**please enter username";
                return false;
            }
             
              
        }
    </script>

    <center>
<div class="login-box">
        <h2>Sign Up</h2>
<div class="form">
        <p>Please fill this form to create an account.</p>
        <br>
        <form onsubmit="return myjs()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 
      <form>
     <fieldset>
        <br>
             <div class="transbox">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <br>
                <span class="error">*<?php echo $name_err; ?></span>
                <span id="messages" style="color:red;" ></span>
             </div>
<br>
             <div class="transbox">
                <label>Username</label>
                <input type="text" id="username" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <br>
                <span class="error">*<?php echo $username_err; ?></span>
                <span id="messagess" style="color:red;" ></span>
            </div>
<br>     <br>           
              
              <div class="transbox">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <br>
                <span class="error">*<?php echo $password_err; ?></span>
            </div>
          
<br>            
             <div class="transbox">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="error">*<?php echo $confirm_password_err; ?></span>
             </div>
              </from>
      </fieldset>
      
<br>

           <div class="transbox">
                <input type="submit" class="btn btn-primary" value="Submit">
                 
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
  </div>
</body>
</html>