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
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Media Production</title>
</head>

<body id="body-pd">

    <body onload="myFunction()">


        <div class="text_title">
            <h1 class="Subj">Media Production</h1>
        </div>

        <div class="navigation_button">
            <div class="button_nav">
                <p class="lectures">
                  <a href="Lectures.php">Lectures</a> </p>
            </div>
            <div class="button_nav">
                <p class="lectures">
                  <a href="Assignments.php">Assignments</a></p>
            </div>
            <div class="button_nav">
                <p class="lectures">
                  <a href="Challenges.php">Challenges</a></p>
            </div>
        </div>
    </div>
<br>
       <h1 class="Subj">Teacher info</h1>

      <br><br><br>

    <!--===== Teacher Boxes =====-->


           <div class="cardd">
             <div class="imgBx">
                <img src="assets/img/jan.jpg" alt="images">
             </div>
             <div class="details">
                <h2>Jan Salge<br><span>Teacher</span></h2>
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


    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 1500);
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
        }
    </script>
</body>

</html>
