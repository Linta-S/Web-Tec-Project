<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
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
<body style="background-color:lavenderblush">
<div class="main-div">
<h1>Delivery man details Details</h1>

<div >
      <label>User search by Name Or Id</label>
        <input type="text" name="myName_1" value="" id="my_name_1">
        <!--<button type="button" name="button_1" id="btn_1">Search</button>-->
        <a href="welcome.php" class="button"> Go Back  </a>
        <div style="border: 1px solid black;" id="content_1">
    </div>
    <script >
      document.getElementById('my_name_1').addEventListener('keyup',loadResponseGet); /*live serch*/
      function loadResponseGet(){
        var my_name = document.getElementById('my_name_1').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'ajax.php?n='+my_name, true);
        xhr.send();
        xhr.onload = function(){
            if(xhr.status == 200){
                document.getElementById('content_1').innerHTML = this.responseText;
            }else if(this.status == 404){
            document.getElementById('content_1').innerHTML = "404 - NOT FOUND!";
          }
        };
      }
    </script>

<div class="center-div"> 
   <div class="table-responsive">
     <table id="customers">
     	<thead>
     		<tr>

           <!--  <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>name</th>-->
             
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
  
           <!-- <tr>
     			<td><?php echo $res['id']; ?> </td>
     			<td><?php echo $res['username']; ?> </td>
     			<td><?php echo $res['password']; ?> </td> 
     			<td><?php echo $res['name']; ?> </td>
     		</tr>   -->

<?php

}

?>



     		
     	</tbody>	
     </table> 
   </div>

</div>
