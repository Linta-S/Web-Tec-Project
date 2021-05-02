<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		h1{
			font-size: 18px;
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
	</style>
</head>
<body style="background-color:lavenderblush">
<div class="main-div">
<h1>Admin Details</h1>

<div >
      <label>User search by  Id</label>
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
        xhr.open('GET', 'ajaxtrans.php?n='+my_name, true);
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
     <table>
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
$selectquery ="select * from trans";
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
