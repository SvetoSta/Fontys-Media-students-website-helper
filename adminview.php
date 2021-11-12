<?php 
require_once 'core/init.php';
include 'includes/header.php';

$data = $user->data();

$db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416','dbi433416','123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->query("SELECT * FROM userss");

if(isset($_POST['promote'])){
  $userid = $_POST['userid'];

      
  $update = $db->prepare("UPDATE userss SET permission=? WHERE id=?");
  $update->execute(["2", $userid]);
  header('location: adminview.php');

}

if(isset($_POST['demote'])){
  $userid = $_POST['userid'];

      
  $update = $db->prepare("UPDATE userss SET permission=? WHERE id=?");
  $update->execute(["1", $userid]);
  header('location: adminview.php');
}


echo"

<link rel='stylesheet' href='assets/css/styles.css'>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</div>";
if ($user->isLoggedIn()) {

  if($user->hasPermission('admin')) {
    while ($row = $stmt->fetch()){?>
    <form action="" method="POST">
    <?php
      echo "<table border='5' cellpadding='5' cellspacing='5' align='center'>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Permissions</th>
      </tr>";
      echo "
        <tr class='tr'>
        <td>";
          echo $row['id'];
          echo " </td>
        <td>";
         echo $row['name'];
         echo "
        </td>
        <td>";
          echo $row['username'];
          echo "
        </td>";
      
        echo "<td>";
        ?>

        <?php
        $result = $db->query("SELECT * FROM userss");
        $row_count = $result->rowCount();
        if($row['permission'] == 2){
        echo "
        <input type='hidden' name='userid' value='". $row['id'] ."'>
        <input type='submit' name='demote' value='Demote'>";
        }
        else{
          echo "
          <input type='hidden' name='userid' value='". $row['id'] ."'>
          <input type='submit' name='promote' value='Promote'>";
        }
        ?>
        </form>

        <?php
        echo "</td>";
        echo "</tr>";
      }
    }

}else{
  echo "<p>You need to <a href='login.php'>log in</a> or <a href='register.php'>register</a></p>";
}

?>