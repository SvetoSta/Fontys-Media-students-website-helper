<?php

// Core Initialization
require_once 'core/init.php';

echo "<div class='maincontainer'>";

// Header
include 'includes/header.php';

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
    <link rel="stylesheet" href="assets/css/styles.css?v=<?php echo time(); ?>">

    <title>Make a poster</title>
</head>

<body id="body-pd">

    <body onload="myFunction()">

      <div class="text_title">
          <h1 class="Subj">Make a poster</h1>
      </div>

      <br><br>


      <p class ="due">Example:</p>



      <div class="example">
      <img src="assets/img/example.jpg">
      </div>

<div class ="homework">

<p>Description:</p>
<hr>
      <p>Hello Braindancers, ready for another challenge?
In this individual Braindancer challenge you will prepare an awesome product poster. For a chosen product idea
(optionally using your group brand guide from the other challenge) prepare an advertisement poster that presents the great
features and most important details of your product. Keep the design simple and effective and use techniques from the movie poster
design lesson.
</p><br>
<p>Deliver:<br>
<hr>
A ready to print A3 PDF of your product poster.
<br>
Good luck! </p><br>
<p>Due:<hr>
27th March</p>
</div>



</body>
</html>
