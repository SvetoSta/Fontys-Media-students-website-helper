<?php


require_once 'core/init.php';

echo "<div class='maincontainer'>";

include 'includes/header.php';

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
        Redirect::to('dashboard.php');
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


<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/end.css">

<div class='change boxbox'>

<form class="" action="" method="post">
  <div class="field form-group">
    <label for="name"  class='textchange'>Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo escape($user->data()->name); ?>">
    
    <label for="username"  class='textchange'>Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo escape($user->data()->username); ?>">
    
    <label for="img" class='textchange'>Profile Picture use <a href="https://www.imageupload.net">This</a></label>
    <input type="text" name="img" class="form-control" value="<?php echo escape($user->data()->img); ?>">
    
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Update">
  </div>
</form>

</div>

