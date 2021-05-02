<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class>
  <h4 style="text-align: center">Registration</h1>
  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<table align="center">
					<tr>
						<td>Name</td>
						<td><input type="text" name="name" placeholder="Give your name" required/></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" placeholder="Give your email" required/></td>
					</tr>
					<tr>
						<td>User Name</td>
						<td><input type="text" name="userName"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" placeholder="Give your password" required/></td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type="password" name="cpassword" placeholder="Retype your password" required></td>
					</tr>
						<tr>
							<td>Gender</td>
							<td>
								<input type="radio" name="gender" value="male" required>Male

								<input type="radio" name="gender" value="female">Female

								<input type="radio" name="gender" value="other">Other
							</td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td><input type="text" name="dob" required></td>
							<td>(dd/mm/yyy)</td>
						</tr>

<tr>					<td>User Type</td>
						<td>
  <input type="radio" name="type" value="Admin" required>Admin


<br>
		</td>

						</tr>

					<tr>
						<td></td>
						<td><input type="submit" name="register" value="Register"/>

						<input type="reset" value="Reset"></td>
					</tr>
				</table>
			</form>
</div>

<div class="footer">
  <p>Copyright © 2021</p>
</div>

</body>
</html>


<?php
if(isset($_POST['register']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$userName=$_POST['userName'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$usertype=$_POST['type'];
	if($password==$cpassword)
	{
	$con=mysqli_connect("localhost","root","","reg");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Row Insert
	if($usertype=="Admin"){
	$sql="INSERT INTO `admin`(`name`, `email`, `userName`, `password`, `gender`, `dob` , `type`)VALUES('$name','$email','$userName','$password','$gender','$dob','','$usertype')";
	if(mysqli_query($con,$sql))
	{
		header("Location:login.php");
	}
	else
	{
		echo "Error in inserting: ".mysqli_error($con);
	}

}



    mysqli_close($con);
    }
    else
    {
    	echo "Password Mismatch";
    }
}

?>