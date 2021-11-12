<?php

require_once 'core/init.php';

echo "<div class='maincontainer'>";


  if (Input::exists()) {
    if (Token::check(Input::get('token'))) {

          $user = new User();
          try {

            $salt = Hash::salt(32);

            $user->create(array(
              'username' => Input::get('username'),
              'email' => Input::get('email'),
              'password' => Hash::make(Input::get('password'), $salt),
              'salt' => $salt,
              'name' => Input::get('name'),
              'joined' => date('Y-m-d'),
              'permission' => 1,
              'img' => 'https://i.ibb.co/DtJhvps/360-F-346839683-6n-APzbhp-Sk-Ipb8pm-Awufk-C7c5e-D7w-Yws.jpg'
            ));

            Session::flash('home', 'You have been registered and can now log in!');
            Redirect::to('login.php');

          } catch (Exception $e) {
            die($e->getMessage());
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
    <form class="" action="register.php" method="post" onsubmit="return validation()">
      <div class="field form-group">
        <label class="lable" for="name">Your Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name"
          autocomplete="off">
        <div id="name_error"></div>
      </div>

      <div class="field form-group">
        <label class="lable" for="name">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo escape(Input::get('email')); ?>"
          id="emails" autocomplete="off">
        <span class="danger" id="emailids"> </span>
      </div>

      <div class="field form-group">
        <label class="lable" for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo escape(Input::get('username')); ?>"
          id="user" autocomplete="off">
        <span class="danger" id="usernames"> </span>
      </div>

      <div class="field form-group">
        <label class="lable" for="password">Choose a password</label>
        <input type="password" class="form-control" name="password" value="" id="pass" autocomplete="off">
        <span class="danger" id="passwords"> </span>
      </div>

      <div class="field form-group">
        <label class="lable" for="password_again">Enter your password again</label>
        <input type="password" class="form-control" name="password_again" value="" id="conpass" autocomplete="off">
        <span class="danger" id="confrmpass"> </span>
      </div>
      


      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
      <input type="submit" class="btn btn-success btn-login form-group" value="Register" name="register">
      </br>
      </br>
      </br>
      <label for="login" class='textchange'>If you already have an account you can <a href="login.php"> Log In </a></label>

    </form>
  </div>
</div>

<script type="text/javascript">
  function validation() {

    var user = document.getElementById('user').value;
    var emails = document.getElementById('emails').value;
    var pass = document.getElementById('pass').value;
    var confirmpass = document.getElementById('conpass').value;

    document.getElementById('usernames').innerHTML = "";
    document.getElementById('passwords').innerHTML = "";
    document.getElementById('confrmpass').innerHTML = "";
    document.getElementById('emailids').innerHTML = "";

    if (user == "") {
      document.getElementById('usernames').innerHTML = " ** Please fill the username field";
      return false;
    }
    if ((user.length <= 2) || (user.length > 20)) {
      document.getElementById('usernames').innerHTML = " ** Username lenght must be between 2 and 20";
      return false;
    }
    if (!isNaN(user)) {
      document.getElementById('usernames').innerHTML = " ** only characters are allowed";
      return false;
    }
    if (pass == "") {
      document.getElementById('passwords').innerHTML = " ** Please fill the password field";
      return false;
    }
    if ((pass.length <= 5) || (pass.length > 20)) {
      document.getElementById('passwords').innerHTML = " ** Passwords lenght must be between  5 and 20";
      return false;
    }

    if (pass != confirmpass) {
      document.getElementById('confrmpass').innerHTML = " ** Password does not match the confirm password";
      return false;
    }



    if (confirmpass == "") {
      document.getElementById('confrmpass').innerHTML = " ** Please fill the confirmpassword field";
      return false;
    }

    if (emails == "") {
      document.getElementById('emailids').innerHTML = " ** Please fill the email idx` field";
      return false;
    }
    if (emails.indexOf('@') <= 0) {
      document.getElementById('emailids').innerHTML = " ** @ Invalid Position";
      return false;
    }

    if ((emails.charAt(emails.length - 4) != '.') && (emails.charAt(emails.length - 3) != '.')) {
      document.getElementById('emailids').innerHTML = " ** . Invalid Position";
      return false;
    }


  }
</script>