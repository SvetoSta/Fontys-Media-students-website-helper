<?php

require_once 'core/init.php';

echo "<div class='maincontainer'></div>";

include 'includes/header.php';

$data = $user->data();


    if (Input::exists()) {

        
        $lectures = new Lectures();

            try {
                $lectures->create(array(
                    'title' => Input::get('title'),
                    'date' => date("d/m/Y"),
                    'src' => Input::get('src'),
                    'descc' => Input::get('descc'),
                    'likes' => 0,
                    'user' => $user->data()->username
                ));

                Session::flash('home','The movie has been added.');
                Redirect::to('Lectures.php');

            } catch(Exception $e){
                die($e->getMessage());
            }

        }
?>

<body>
  <div class="create-center">
    <form class="searchfield" action="" method="post">
      <div class="field form-group">
        <label for="title" class='textchange'>Post Title</label>
        <input type="text" class="form-control ctrll" name="title" value="<?php echo escape(Input::get('title')); ?>"
          id="title" autocomplete="off">
      </div>

      <div class="field form-group">
        <label for="desc" class='textchange'>Description</label>
        <input type="text" class="form-control ctrll" name="descc" value="<?php echo escape(Input::get('descc')); ?>"
          id="descc" autocomplete="off">
      </div>

      <div class="field form-group">
        <label for="desc" class='textchange'>Link</label>
        <input type="text" class="form-control ctrll" name="src" value="<?php echo escape(Input::get('src')); ?>"
          id="src" autocomplete="off">
      </div>

      </br>
      </br>

      <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
      <input type="submit" class="btn btn-success left" value="Create Post">

    </form>
  </div>

</body>