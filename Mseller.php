 <!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <style>
   /*Extra part*/
    h1{
      font-size: 22px;
      color: #000;
      text-align: center;
      margin-top:-20;
      margin-bottom:20px;
    }
    table{
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 10px 20 0 rgba(0,0,0,.03);
      border-radius: 10px;
      margin: auto;

    }

        th,td{
          border:1px solid #FFA500;
          padding: 8px 30px;
          text-align: center;
          color:grey;

        }

        th{
          text-transform: uppercase;
          font-weight: 500;
        }
        td{
          font-size: 13px;
        }
/*Extra part*/

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: teal; /*1st row clr */
  color: white;
}
 
 .button {
  background-color: darkcyan; /*button clr */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 100%;
}
 
 /*pop up button*/
 .open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
  </style>
</head>
<body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}>
<div class="main-div">

<h1> Sellers Details</h1>
<div class="transparent-box">
<div class="center-div"> 
   <div class="table-responsive">
     <table id="customers">
      <thead>
        <tr>

            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>name</th>
            <th colspan="2"> Operations</th>
             
        </tr>
      </thead>
      <tbody>

 <?php

include 'config.php';
$selectquery ="select * from users";
$query =mysqli_query($link,$selectquery);

$nums=mysqli_num_rows($query);
//echo $nums;

$res=mysqli_fetch_array($query);
//echo $res[1];

 while($res=mysqli_fetch_array($query)){  
 ?>
  
          <tr>
          <td><?php echo $res['id']; ?> </td>
          <td><?php echo $res['username']; ?> </td>
          <td><?php echo $res['password']; ?> </td> 
          <td><?php echo $res['name']; ?> </td>
         <!-- <td><a href='sedit.php'?id<?php echo $res['id']; ?>=$res'[rollno]' onclick='return checkdelete()'>Edit</a></td>
           <td><a href='delet.php'?rn=$res'[rollno]' onclick='return checkdelete()'>Delete</a></td>-->
         
          <td><a href ='sdelet.php?id=$res[id]'>Delete</a></td>
             
             <td><a href="sedit.php?id=<?php echo $res["id"]; ?>">Edit</a></td>

        </tr>

<?php

}

?>



        
      </tbody>  
     </table>
   </div>

</div>

</div>
</div>
 <center>
   
      

  
<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Email" name="name" id="name" required>

    <label for="username"><b>username</b></label>
    <input type="text" placeholder="Enter Password" name="username" id="username" required>
    <label for="password"><b>password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <button type="submit" class="btn btn danger" data-dismiss="model" onclick="addRecord()" >Add user</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script>

  function addRecord(){
    var name =$('#name').val();
    var name =$('#username').val();
    
    var name =$('#password').val();
    
 $.ajax({

url:"backend1.php",
type:'post',
data:
{
 name:name,
 usernamne:username,
 password:password
},

success:function(data,status){
  readRecords();
}

 });
  }
</script>

</body>

</html>
