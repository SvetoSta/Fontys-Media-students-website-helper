<?php

require_once 'core/init.php';

include 'includes/header.php';

$lecturesid = $_POST['lecturesid'];

$db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416','dbi433416','123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['edit'])){
    $lecturesid = $_POST['lecturesid'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $src = $_POST['src'];
    
    $update = $db->prepare("UPDATE lectures SET title=?, descc=?, src=? WHERE id=?");
    $update->execute([$title, $desc, $src,$lecturesid]);
    header('location: Lectures.php');
}


$stmt = $db->query("SELECT * FROM lectures WHERE id=$lecturesid");

while ($row = $stmt->fetch()){
    echo'
    <div class="create-center">
    <form class="searchfield" action="updatelectures.php" method="post">
    <div class="field form-group">
      <label for="title" class="lable">Lecture Name</label>
      <input type="text" class="form-control ctrll" name="title" value="'.$row['title'].'" autocomplete="off">
    </div>
  
    <div class="field form-group">
      <label for="desc" class="lable">Lecture Description</label>
      <input type="text" class="form-control ctrll" name="desc" value="'.$row['descc'].'" autocomplete="off">
    </div>

    <div class="field form-group">
    <label for="src" class="lable">Lecture Description</label>
    <input type="text" class="form-control ctrll" name="src" value="'.$row['src'].'" autocomplete="off">
  </div>

    </br>
    </br>

    <input type="hidden" name="lecturesid" value="'.$lecturesid.'">
    <input type="submit" name="edit" class="btn btn-success left" value="Edit Post">
  
  </form>
  </div>
';
}
