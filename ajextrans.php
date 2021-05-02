<?php

require "config.php";
 
$id = "";
$flag_get = 0;

if($_SERVER["REQUEST_METHOD"]=="GET" && count($_GET)>0){
  $flag_get = 1;
  if(!empty($_GET['n'])){
     
     $id = $_GET['n'];
    $sql = "select * from trans where name like   id like '%$id%';";
    $result = mysqli_query($link, $sql);
  }

  else{
    $sql = "select * from  trans;";
    $result = mysqli_query($link, $sql);
  }
}
else{
  header("Location:sell-transaction.php");
}



?>
<?php if($flag_get==1){ ?>

  <table align="center" border="1" width="40%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Totalpament</th>
        <th>Payment</th>
       

      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['totalpament']; ?></td>
          <td><?php echo $row['payment']; ?></td>
       

        </tr>
      <?php } ?>
    </tbody>
  </table>

<?php } ?>