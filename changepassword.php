<?php
require_once 'core/init.php';

include 'includes/header.php';

$user = new User();

if (!$user->isLoggedIn()) {
  Redirect::to('login.php');
}
if (Input::exists()) {
  if (Token::check(Input::get('token'))) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
      'password_current' => array(
        'required' => true,
        'min' => 5
      ),
      'password_new' => array(
        'required' => true,
        'min' => 5
      ),
      'password_new_again' => array(
        'required' => true,
        'min' => 5,
        'matches' => 'password_new'
      )
    ));
    if($validation->passed()) {
      if (Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
        echo 'Your current password is wrong.';
      } else {

        $salt = Hash::salt(32);
        $user->update(array(
          'password' => Hash::make(Input::get('password_new'), $salt),
          'salt' => $salt
        ));

        Session::flash('home', 'Your password has been changed.');
        Redirect::to('dashboard.php');


      }
    } else {
      foreach($validation->errors() as $error) {
        echo $error, '<br>';
    }
  }
}
}
?>


<link rel="stylesheet" href="assets/css/styles.css">

<div class='change boxbox'>

<form class="" action="" method="post">
  <div class="field form-group">
    <label for="password_current" class='textchange' textchange>Current password</label>
    <input type="password" class="form-control ctrl" name="password_current" value="" id="password_current" autocomplete="off">
  </div>

  <div class="field form-group">
    <label for="password_new" class='textchange' textchange>New password</label>
    <input type="password" class="form-control ctrl" name="password_new" value="" id="password_new" autocomplete="off">
  </div>

  <div class="field form-group">
    <label for="password_new_again" class='textchange' >New password again</label>
    <input type="password" class="form-control ctrl" name="password_new_again" value="" id="password_new_again" autocomplete="off">
  </div>
  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
  <input type="submit" class='btn left' value="Change" style="
    margin-top: 70px;">

</form>

</div>