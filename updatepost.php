<?php

require_once 'core/init.php';

echo "<div class='maincontainer'>";

include 'includes/header.php';

$postid = $_POST['postid'];

$db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416','dbi433416','123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST['edit'])){
    $postid = $_POST['postid'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    

    
    
    $update = $db->prepare("UPDATE posts SET title=?, descc=? WHERE id=?");
    $update->execute([$title, $desc, $postid]);
    header('location: posts.php');
}


$stmt = $db->query("SELECT * FROM posts WHERE id=$postid");

while ($row = $stmt->fetch()){
    echo'
    <div class="create-center">
    <form class="searchfield" action="updatepost.php" method="post">
    <div class="field form-group">
      <label for="title" class="lable">Post Name</label>
      <input type="text" class="form-control ctrll" name="title" value="'.$row['title'].'" autocomplete="off">
    </div>
  
    <div class="field form-group">
      <label for="desc" class="lable">Post Description</label>
      <input type="text" class="form-control ctrll" name="desc" value="'.$row['descc'].'" autocomplete="off">
    </div>

    </br>
    </br>

    <input type="hidden" name="postid" value="'.$postid.'">
    <input type="submit" name="edit" class="btn btn-success left" value="Edit Post">
  
  </form>
  </div>
';
}
