<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Moogul</title>

      <!-- ===== BOX ICONS ===== -->
      <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/styles.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



  <style media="screen">
    .maincontainer {
      margin-top: 70px;
    }
  </style>

</head>

<body>

      <div class="hero">
        <header class="header" id="header">
          <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
          </div>

          <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
              <div class="searchbar">
                <input class="search_input" type="text" name="" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
              </div>
            </div>
          </div>

          <?php $user = new User(); 
          if ($user->isLoggedIn()) { ?>


          <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <img href="dashboard.php" src="<?php echo escape($user->data()->img); ?>" alt="" style="width: 40px; height: 40; border-radius: 20px;">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile <?php echo escape($user->data()->name); ?></a>
              <a class="dropdown-item" href="#">My Favorites</a>
              <a class="dropdown-item" href="#">Messages<span class="badge bg-primary">5</span>
                <span class="visually-hidden"></span></a>
            </div>
          </div>

          <?php }
          else { ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
          </ul>
          <?php } ?>


        </header>

        <div class="l-navbar" id="nav-bar">
          <nav class="nav">
            <div>
              <a href="dashboard.php" class="nav__logo">
                <img class="logo" src="assets/img/logo.png" alt="">
                <span class="nav__logo-name">Moogul</span>
              </a>

              <div class="nav__list">
                <a href="dashboard.php" class="nav__link active">
                  <i class='bx bx-grid-alt nav__icon'></i>
                  <span class="nav__name">Dashboard</span>
                </a>

                <a href="posts.php" class="nav__link">
                  <i class='bx bxs-message-square-detail nav__icon'></i>
                  <span class="nav__name">Forum</span>
                </a>

                <a href="profile.php?user=<?php echo escape($user->data()->username); ?>" class="nav__link">
                  <i class="fas fa-id-card-alt nav__icon"></i>
                  <span class="nav__name">Profile</span>
                </a>
              </div>
            </div>

            <a href="logout.php" class="nav__link">
              <i class='bx bx-log-out nav__icon'></i>
              <span class="nav__name">Log Out</span>
            </a>
          </nav>
        </div>


 