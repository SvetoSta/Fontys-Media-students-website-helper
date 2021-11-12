<?php

// Core Initialization
require_once 'core/init.php';

echo "<div class='maincontainer'>";

if (Input::exists()) {
  //echo "teste";
  if(Token::check(Input::get('token'))) {

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'username' => array('required' => true),
      'password' => array('required' => true)
    ));
    if($validation->passed()) {
      //echo "Passou!";
      $user = new User();
      $remember = (Input::get('remember') === 'on') ? true : false;
      $login = $user->login(Input::get('username'), Input::get('password'), $remember);
      if ($login) {
        Redirect::to('dashboard.php');
      } else {
        echo "<p class='label label-danger'>Sorry, logging in failed.</p><br><br>";
      }

    } else {
      foreach($validation->errors() as $error) {
        echo $error, '<br>';
      }
    }

  }
}
?>
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
  integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<!-- ===== CSS ===== -->
<link rel="stylesheet" href="assets/css/styles.css">

<div class="login">
  <div class="login-center">
    <div class='change boxbox'>
      <form class="" action="login.php" method="post" onsubmit="return validation()">

        <div class="field form-group">
          <label for="username" class='textchange'>Username:</label>
          <input type="text" class="form-control ctrl" name="username" id="username" autocomplete="off">
          <span class="danger" id="usernames"> </span>
        </div>

        <div class="field form-group">
          <label for="password" class='textchange'>Password:</label>
          <input type="password" class="form-control ctrl" name="password" id="password" autocomplete="off">
          <span class="danger" id="passwords"> </span>
        </div>

        <div class="field form-group">
          <label for="remember" style="color: white;">
            <input type="checkbox" name="remember" id="remember"> Remember me
          </label>
        </div>

</br>

        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" class="btn btn-primary left btn-login form-group" value="Log in">
        </br>
        </br>
        </br>
        <label for="register" class='textchange'>If you do not have an account you can register here: <a href="register.php"> Register </a></label>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function validation() {

    var user = document.getElementById('username').value;
    var pass = document.getElementById('password').value;

    document.getElementById('usernames').innerHTML = "";
    document.getElementById('passwords').innerHTML = "";

    if (user == "") {
      document.getElementById('usernames').innerHTML = "Please fill the username field";
      return false;
    }

    if (pass == "") {
      document.getElementById('passwords').innerHTML = "Please fill the password field";
      return false;
    }

  }
</script>