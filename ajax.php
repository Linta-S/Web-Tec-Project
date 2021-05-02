<?php

require "config.php";
$namet = "";
$id = "";
$flag_get = 0;

if($_SERVER["REQUEST_METHOD"]=="GET" && count($_GET)>0){
  $flag_get = 1;
  if(!empty($_GET['n'])){
    $namet = $_GET['n'];
     $id = $_GET['n'];
    $sql = "select * from users where name like '%$namet%' OR id like '%$id%';";
    $result = mysqli_query($link, $sql);
  }

  else{
    $sql = "select * from  users;";
    $result = mysqli_query($link, $sql);
  }
}
else{
  header("Location: sellers.php");
}



?>
<?php if($flag_get==1){ ?>

  <table align="center" border="1" width="40%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
       

      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['password']; ?></td>
       

        </tr>
      <?php } ?>
    </tbody>
  </table>

<?php } ?>