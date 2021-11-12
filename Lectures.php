<?php 
require_once 'core/init.php';
include 'includes/header.php';

echo "
<div class='maincontainer'></div>";

$data = $user->data();

$db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416','dbi433416','123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->query("SELECT * FROM lectures");
$count = $stmt->rowCount();

if(isset($_POST['deleted'])){
  $lecturesid = $_POST['lecturesid'];
  $result = $db->query("SELECT * FROM lectures WHERE id = $lecturesid");
  $row = $result->fetch(PDO::FETCH_ASSOC);

  $delete = "DELETE FROM lectures WHERE id=?";
  $stmntdelete = $db->prepare($delete);
  $stmntdelete->execute([$lecturesid]);
  exit();
}
?>


<div class="text_title">
                <h1 class="Subj">Lectures</h1>
            </div>
<br><br>

<?php

echo"
<link rel='stylesheet' href='assets/css/styles.css'>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</div>";
  if ($user->isLoggedIn()) {
        echo "<a href = 'addlecture.php' class='ad'><button type='button' class='btn btn-primary btn-create' style='position: relative; left:44%;'>Add Lecture</button></a>";
      ?>




<?php 
      echo"
        <form action='updatelectures.php' method='POST'>
        <div class='serv'>
  <ul>";
        foreach ($stmt as $row) {
         echo" <li><a href='#'><p class = 'idk'>".$row['title']."</p></a>
         <iframe class = 'idk2' src='".$row['src']."' frameborder='0' allowfullscreen></iframe>
       </li>
       </br>
       </br>";

  if($user->hasPermission('admin')){
    print $row['id'];
   echo "
   <div class='buttons-lectures'>
    <input type='submit' class='edit info lecturess' name='editlecture' value='Edit'>
    <input type='hidden' name='lecturesid' value='". $row['id'] ."'>
    <span><a href='' class='delete info lecturess' id='". $row['id'] ."'>Delete</a></span>
    </div>";}
        }
        echo"   </ul>
        </div>";
          echo"</form>";
?>

<?php
  echo "";
} else {
echo "<p>You need to <a href='login.php'>log in</a> or <a href='register.php'>register</a></p>";
while ($row = $stmt->fetch()){
echo ">";
}
}
?>

<script src="assets/js/main.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>


<script type='text/javascript'>
 $(document).ready(function () {
  $('.delete').click(function () {
    var lecturesid = $(this).attr('id');
    $.ajax({
      url: 'Lectures.php',
      type: 'post',
      async: false,
      data: {
        'deleted': 1,
        'lecturesid': lecturesid
      },
      success: function () {

      }
    });
  });
});
</script>