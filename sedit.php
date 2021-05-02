
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
    <center>
<div class="login-box">
     
        <h2>Sign Up</h2>
<div class="form">
        <p>Please fill this form to create an account.</p>
        <br>
        <form   action="sedit.php"    method="post">


      

<?php
include 'config.php';
 $id =$_GET['id'];
$showquery = "SELECT * from users where id={$id }"; 

$showdata=mysqli_query($link,$showquery);
 
 $arrdata=mysqli_fetch_array($showdata);

 

if(isset($_POST['submit'])){
    echo "hellow world";
     $idupdate= $_GET['id'];

     $name=  $_POST['name'];
     $username=  $_POST['username'];


     //$insertquery ="insert into users(name,username) values('$name','$username')";


    $query="update users set id=$id,name='$name',username= '$username' where id=$idupdate";

     $ress=mysquli_query($link, $query);



     if($res)
     {
        ?>
        <script>
            alart(' connected !!!');
        </script>
        <?php
     }
     else{
        ?>
        <script>
         alart(' Not connected !!!'); 
         </script>
         <?php  
     }
}
?>



 
      <form>
     <fieldset>
        <br>
             <div class="transbox">
                <label>Name</label>
                <input type="text" id="name" name="name"   value=" <?php echo $arrdata['name']; ?>">
                <br>
                 
                 
               
             </div>
<br>
             <div class="transbox">
                <label>Username</label>
                <input type="text" id="username" name="username"    value=" <?php echo $arrdata['username']; ?>">
                <br>
                 
            </div>
<br>     <br>           
              
              
              
               
            </div>
          
<br>            
              
                  
              </from>
      </fieldset>
      
<br>

           <div class="transbox">
                <input type="submit" class="btn btn-primary" value="Update">
                 
            </div>
           <a href="Mseller.php" class="button"> Go Back  </a>
        </form>
    </div>
  </div>

</body>
</html>



