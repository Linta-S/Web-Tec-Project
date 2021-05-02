<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
     
    <style>
  
    .transparent-box {
  background-color:white;
  opacity: .5;
} 

body { 
  color: black; 
height:;
}  

 
 .btn-group .button {
  background-color: #3CB371; /* Green */
  border: 3px solid black;
  color: white;
  padding: 18px 33px;
  text-align: center;
  text-decoration: none;
  font-size: 20px;
  cursor: pointer;
  width: 170px;
  display: block;
}

.btn-group .button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}
 
.btn-group .button:hover {
  background-color: #3e8e41;
} 
 
 


    </style>
</head>
<body style="background-image: url(pic13.jpeg); background-size: cover;">
 
</div>
    <br>
  
    <center>
         
     <h1><div class="transparent-box">Hi Admin, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.This is our deilivery Details page.</div></h1>  

 
 
 <div class="btn-group">
        <a href="deliverys.php" class="button">delivery  Boys Profile</a>
     
       <a href="delivery-transaction.php" class="button">Transatction Details </a>
  
       <a href="more.php" class="button"> More</ </a>
        <a href="welcome.php" class="button"> Go Back  </a>
        <a href="logout.php" class="button"> Sign Out  </a>
   </div>
   </center>
  
   <!--  <div><p id="p3"> <a href="reset-password.php" class="submit">Reset Your Password</a> </p> </div> 

       <!--  <div> <br><a href='reset-password.php'><input type=button value="Reset Your Password" name="Reset Your Password" ></a></div>-->
        
        <br>
       <!-- <div><a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a></div> -->
    </p>
</body>
</html>