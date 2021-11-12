<?php 
require_once 'core/init.php';
include 'includes/header.php';

echo "
<div class='maincontainer'></div>";

$data = $user->data();

$db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416','dbi433416','123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->query("SELECT * FROM likes");


if(isset($_POST['liked'])){
  $postid = $_POST['postid'];
  $result = $db->query("SELECT * FROM movies WHERE id = $postid");
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $n = $row['likes'];

  $like = "UPDATE movies SET likes=? WHERE id=$postid";
  $insert = "INSERT INTO likes(userid, postid) VALUES(?, ?)";
  $stmt1 = $db->prepare($like);
  $stmt1->execute([$n+1]);
  $stmt2 = $db->prepare($insert);
  $stmt2->execute([$data->id, $postid]);
  exit();
}

if(isset($_POST['unliked'])){
  $postid = $_POST['postid'];
  $result = $db->query("SELECT * FROM movies WHERE id = $postid");
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $n = $row['likes'];

  $like = "UPDATE movies SET likes=? WHERE id=$postid";
  $insert = "DELETE FROM likes WHERE postid=? AND userid=?";
  $stmt1 = $db->prepare($like);
  $stmt1->execute([$n-1]);
  $stmt2 = $db->prepare($insert);
  $stmt2->execute([$postid, $data->id]);
  exit();
}


echo"
<link rel='stylesheet' href='css/movies.css'>
<link rel='stylesheet' href='css/profile.css'>
<link rel='stylesheet' href='css/header.css'>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</div>";

  if ($user->isLoggedIn()) {
      $nRows = $db->query("SELECT count(postid) FROM likes WHERE userid=$data->id")->fetchColumn();

      $sth = $db->prepare("SELECT postid FROM likes WHERE userid=$data->id");
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
      
      for($i = 0; $i < $nRows; $i++){
            $stmt = $db->query("SELECT * FROM movies WHERE id = $result[$i]");
             while ($row2 = $stmt->fetch()){
               echo "
                   <div class='overlay'>
                     <div class='gallery'>
                        <img src=". $row2['src'] .">
                        <div class='desc'>".$row2['movieName']."</div> 
                     </div>
                   </div>";
                        
     }
    }
} else {
      echo "<p>You need to <a href='login.php'>log in</a> or <a href='register.php'>register</a></p>";
      }



?>



<script type='text/javascript'>
  $(document).ready(function(){

    $('.like').click(function(){
      var postid= $(this).attr('id');
      $.ajax({
        url: 'movies.php',
        type: 'post',
        async: false,
        data:{
          'liked': 1,
          'postid' : postid
        },
        success: function(){

        }
      });
    });
  $('.unlike').click(function(){
      var postid= $(this).attr('id');
      $.ajax({
        url: 'movies.php',
        type: 'post',
        async: false,
        data:{
          'unliked': 1,
          'postid' : postid
        },
        success: function(){

        }
      });
    });
  });

let modal = Array.from(document.getElementById('myModal'));

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

for(var i = 0; i < modal.length; i++){

    

}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
