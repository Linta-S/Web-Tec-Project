

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
 
}  

 
 .btn-group .button {
  background-color: #3CB371; /* Green */
  border: 3px solid black;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  font-size: 20px;
  cursor: pointer;
  width: 160px;
  display: block;
}

.btn-group .button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

.btn-group .button:hover {
  background-color: #3e8e41;
}
/*footer*/
body {
  margin: 0;
}
/* Style the footer */
.footer {  
position: fixed;
            padding: 10px 10px 10px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/ 
            height: 50px;
            background: black;
            text-align: right;
            color: white;
            font-weight: bolder ;
}

    </style>
</head>
<body style="background-image: url(pic13.jpeg); background-size: cover;">
 
</div>
    <br>
  
    <center>
         
     <h1><div class="transparent-box">Hi Admin, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our Home.</div></h1>  

</center>
 
 <div class="btn-group">
        <a href="profile.php" class="button"> Profile</ </a>
       <br>
       <a href="seller.php" class="button"> Seller</ </a>
       <br>
       <a href="customer.php" class="button"> Customer</ </a>
        
       <br>
       <a href="delivery.php" class="button"> Delivery</ </a>
       <br>
       <a href="products.php" class="button"> Products</ </a>
       <br>
       <a href="more.php" class="button"> More</ </a>
       <br>
       <a href="reset-password.php" class="button"> Reset Password</ </a>
       <br>
        <a href="logout.php" class="button"> Sign Out  </a>
   </div>

   <div class="transparent-box">
  <div class="footer">
  <p><h4>Copyright &copy; 2021 Admin<br>sahara@gmailAdmin</h4></p>
 
</div>
  </div>
   <!--  <div><p id="p3"> <a href="reset-password.php" class="submit">Reset Your Password</a> </p> </div> 

       <!--  <div> <br><a href='reset-password.php'><input type=button value="Reset Your Password" name="Reset Your Password" ></a></div>-->
        
        <br>
       <!-- <div><a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a></div> -->
    </p>
</body>
</html>