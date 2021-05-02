 <!DOCTYPE html>
<html>
<head>
   
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
 

  </style>
</head>
<body >
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
  <a href="welcome.php" class="button"> Go back</ </a>
    
</body>
</html> 