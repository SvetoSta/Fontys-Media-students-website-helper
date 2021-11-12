<?php
require_once 'core/init.php';
include 'includes/header.php';

echo "
<div class='maincontainer'></div>";

$data = $user->data();

$db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416','dbi433416','123');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->query("SELECT * FROM posts");


if(isset($_POST['liked'])){
  $postid = $_POST['postid'];
  $result = $db->query("SELECT * FROM posts WHERE id = $postid");
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $n = $row['likes'];

  $like = "UPDATE posts SET likes=? WHERE id=$postid";
  $insert = "INSERT INTO likes(userid, postid) VALUES(?, ?)";
  $stmt1 = $db->prepare($like);
  $stmt1->execute([$n+1]);
  $stmt2 = $db->prepare($insert);
  $stmt2->execute([$data->id, $postid]);
  exit();
}

if(isset($_POST['unliked'])){
  $postid = $_POST['postid'];
  $result = $db->query("SELECT * FROM posts WHERE id = $postid");
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $n = $row['likes'];

  $like = "UPDATE posts SET likes=? WHERE id=$postid";
  $insert = "DELETE FROM likes WHERE postid=? AND userid=?";
  $stmt1 = $db->prepare($like);
  $stmt1->execute([$n-1]);
  $stmt2 = $db->prepare($insert);
  $stmt2->execute([$postid, $data->id]);
  exit();
}

if(isset($_POST['deleted'])){
  $postid = $_POST['postid'];
  $result = $db->query("SELECT * FROM posts WHERE id = $postid");
  $row = $result->fetch(PDO::FETCH_ASSOC);

  $delete = "DELETE FROM posts WHERE id=?";
  $stmntdelete = $db->prepare($delete);
  $stmntdelete->execute([$postid]);
  exit();
}


echo"
<link rel='stylesheet' href='assets/css/styles.css'>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

</div>";
  if ($user->isLoggedIn()) {
        echo "<a href = 'createpost.php' class='ad'><button type='button' class='btn btn-primary btn-create' style='position: relative; left:44%;'>Create Thread</button></a>";

      ?>

<?php
      while ($row = $stmt->fetch()){
        echo "
        <div id='".$row['id']."' class='modal'>
        <div class='modal-content'>
          <span class='close'>&times;</span>
          <p>".$row['title']."</p>
          <p>".$row['date']."</p>
          <p>".$row['descc']."</p>
        </div>
      </div>
      ";
      ?>
<?php


      echo"
        <form action='' method='POST'>
        <div class='container-fluid mt-100'>
        <div class='row'>
            <div class='col-md-12' style='margin-top: 50px;'>
                <div class='card mb-4'>
                    <div class='card-header'>
                        <div class='media flex-wrap w-100 align-items-center'> <img
                                src='"?> <?php echo escape($user->data()->img); ?>
                                <?php echo "' class='d-block ui-w-40 rounded-circle'
                                alt='' style='width: 80px;'>
                            <div class='media-body ml-3'> <a href='javascript:void(0)' data-abc='true'>" . $row['user'] ."</a>
                                    <p class='text-center title-thread'>".$row['title']."</p>
                                <div class='text-muted small'>N#of days of post</div>
                            </div>
                            <div class='text-muted small ml-3'>
                                <div> Added on <strong>".$row['date']."</strong></div>
                                <div><strong>N#posts</strong> posts</div>
                            </div>
                        </div>
                    </div>
                    <div class='card-body'>
                    ".$row['descc']."
                    </div>
                    <div
                        class='card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3'>
                        <div class='px-4 pt-3'>
                        <span
                                    class='align-middle'>".$row['likes']." likes</span> </a> <span
                                class='text-muted d-inline-flex align-items-center align-middle ml-4'> <i
                                    class='fa fa-eye text-muted fsize-3'></i>&nbsp; <span
                                    class='align-middle'>N#Views</span> </span> </div>
                        <div class='px-4 pt-3'> 
                        
                        <form method='post' action=''>
                        <input type='submit' class='btn btn-primary' name='".$row['id']."' value='Add comment' />
                        </form>";

                        if (isset($_POST[$row['id']])) {

                          echo '
                                    <form method="get" action=""> 
                                      
                                      </form>
                        
                        
                                    <form method="post" action="">
                                    <textarea class ="replycom" name="newReply"> </textarea>
                                       <input type="submit" class="btn btn-kodq" name="replybtn' .$row['id'].  '" value="Submit"/>
                                       </form>;
                        }

                        </div>
                        </div>
                    </div>';

                        if (isset($_POST['replybtn'.$row['id']])) {
                          //echo '<label>' . $_POST['newReply'] .  '</label>';
                        
                          CreateReply( $row['id'], 13, $_POST['newReply']);
                          
                        }

                        $array = GetReplies($row['id']);

foreach ($array as $key => $value) {
    echo '<h2>' . $value . '</h2>';
}

                        echo "</div>
                  
        </div>
      </div>" ?>


<?php

    $data = $user->data(); // user exists

    $result = $db->query("SELECT * FROM likes WHERE userid=$data->id AND postid= ".$row['id']."");
    $row_count = $result->rowCount();
    if($row_count == 1){
     echo "<span><a href='' class='unlike' id='". $row['id'] ."'>&#9825;</a></span>";
    }
    else{
     echo "<span><a href='' class='like' id='". $row['id'] ."'>&#10084;</a></span>";
    }

    if($user->hasPermission('admin') || $row['user'] == $user->data()->username){
     echo "<input type='submit' class='edit info' name='editmovie' value='Edit'>
           <input type='hidden' name='postid' value='". $row['id'] ."'>
           <span><a href='' class='delete info' id='". $row['id'] ."'>Delete</a></span>";
   }

    echo"</form>";

  echo "
    <div class='desc'>".$row['title']."</div>
 </div>
</div>";

}else {
echo "<p>You need to <a href='login.php'>log in</a> or <a href='register.php'>register</a></p>";
while ($row = $stmt->fetch()){
echo "
<div class='overlay'>
<div class='gallery'>
<img src=". $row['src'] .">
<div class='desc'>".$row['title']."</div>
</div>
</div>";
}
}
?>


<?php

function CreateReply($postID, $userID, $msg)
        {
            $db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416', 'dbi433416', '123');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = 'INSERT INTO reply (postid, userid, msg) VALUES (:pid, :uid, :msg)';
            $values = array(':pid' => $postID, ':uid' => $userID, ':msg' => $msg);

            try {
                $res = $db->prepare($query);
                $res->execute($values);
            } catch (PDOException $e) {
                throw new Exception('Database query error' . $e->getMessage());
            }
        }

        function GetReplies($postID)
        {
            $db = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi433416', 'dbi433416', '123');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = 'Select msg FROM reply WHERE postid = :pid';
            $values = array(':pid' => $postID);

            try {
                $res = $db->prepare($query);
                $res->execute($values);
            } catch (PDOException $e) {
                throw new Exception('Database query error' . $e->getMessage());
            }

            

            return $res->fetchAll(PDO::FETCH_COLUMN);
            //PDO::FETCH_ASSOC
        }
        
?>












<script type='text/javascript'>
  $(document).ready(function () {

    $('.like').click(function () {
      var postid = $(this).attr('id');
      $.ajax({
        url: 'posts.php',
        type: 'post',
        async: false,
        data: {
          'liked': 1,
          'postid': postid
        },
        success: function () {

        }
      });
    });

    $('.unlike').click(function () {
      var postid = $(this).attr('id');
      $.ajax({
        url: 'posts.php',
        type: 'post',
        async: false,
        data: {
          'unliked': 1,
          'postid': postid
        },
        success: function () {

        }
      });
    });
  });

  $('.delete').click(function () {
    var postid = $(this).attr('id');
    $.ajax({
      url: 'posts.php',
      type: 'post',
      async: false,
      data: {
        'deleted': 1,
        'postid': postid
      },
      success: function () {

      }
    });
  });

  if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }

</script>