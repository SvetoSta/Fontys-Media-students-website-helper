<?php

require_once 'core/init.php';

echo "<div class='maincontainer'>";

include 'includes/header.php';

if (!$username = Input::get('user')) {
  Redirect::to('dashboard.php');
} else {
  $user = new User($username);
  if (!$user->exists()) {
    Redirect::to(404);
  } else {
    $data = $user->data(); // user exists
  }

  $user = new User();

if(!$user->isLoggedIn()) {
  Redirect::to('dashboard.php');
}

if(Input::exists()) {
  if(Token::check(Input::get('token'))) {

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'name' => array(
        'required' => true,
        'min' => 2,
        'max' => 50
      )
    ));
    if($validation->passed()) {
      try {
        $user->update(array(
          'name' => Input::get('name'),
          'username' => Input::get('username'),
          'img' => Input::get('img')
        ));
        Session::flash('home', 'Your details have been updated.');
        Redirect::to('profile.php');
      } catch (Exception $e) {
        die($e->getMessage());
      }

    } else {
      foreach($validation->errors() as $error) {
        echo $error, '<br>';
      }
    }
  }
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ===== BOX ICONS ===== -->
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body id="body-pd">

  <div class="profile-center">
    <div class="p-details">
      <div class="d-flex center-center justify-content-center">
        <img src="<?php echo escape($data->img); ?>" alt=""
          style="margin-top: 20px; width: 250px; height: 230px; border-radius: 150px;">
      </div>
      <div class="d-flex center-center justify-content-center">
        <h3> <?php echo escape($data->username); ?> </h3>
      </div>
      <div class="d-flex justify-content-center">
        <h3> Fontys University Of Applied Sciences: ICT </h3>
      </div>
      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-fav-res btn-lg">Favorites</button>
      </div>
      <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-fav-res btn-lg">Responces</button>
      </div>

    </div>
    <br>
    <div class="p-details-details">
      <div class="d-flex justify-content-center" style="margin-top: 50px;">
        <div class='change boxbox'>
          <form class="" action="" method="post">
            <div class="field form-group">
              <label for="name" class='textchange'>Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo escape($user->data()->name); ?>">

              <label for="username" class='textchange'>Username</label>
              <input type="text" name="username" class="form-control"
                value="<?php echo escape($user->data()->username); ?>">

              <label for="img" class='textchange'>Profile Picture</label>
              <input type="text" name="img" class="form-control" value="<?php echo escape($user->data()->img); ?>">

              <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
              <input type="submit" style="btn-fav-res" value="Update">
            </div>
          </form>
          </div>
        </div>
        <br>
        <a href="changepassword.php"><button class="btn btn-fav-res">Change Password</button></a>
        <a href="logout.php"><button class="btn btn-fav-res">Logout</button></a>
      </div>
    </div>

  <!--===== MAIN JS =====-->
  <script src="assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
</body>

</html>

<?php
if($user->hasPermission('admin')) {
  echo "<p class='text'>You are an Administrator!</p>";
  echo "<a href='adminview.php'><button class='btn'>View All Users</button></a>";
}
else if($user->hasPermission('user')) {
  echo "<p class='text'>You are an User!</p>";
  echo "<a href='favorites.php'><button class='btn'>Favorites</button></a>";
}

}