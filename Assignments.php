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

    <title>Assignments</title>
</head>

<body id="body-pd">

    <body onload="myFunction()">

        <div class="text_title">
            <h1 class="Subj">Assignments</h1>
        </div>

        <br><br>


        <!--===== Assignements =====-->


        <div class="idea">
            <div class="icon">
                <img src="assets/img/icon.jpg">
            </div>
            <div class="text">
                <h1><a href="homework.php"> Make a presentation</a></h1>
                <div class="alert alert-danger" role="alert">
                    Due 27th March
                </div>

            </div>
        </div>

        <div class="lines">
            <hr>
        </div>


        <br><br>

        <div class="idea">
            <div class="icon">
                <img src="assets/img/icon.jpg">
            </div>
            <div class="text">
                <h1>Make a poster</h1>
                <div class="alert alert-danger" role="alert">
                    Due 20th March
                </div>
            </div>
        </div>

        <div class="lines">
            <hr>
        </div>

        <br><br>


        <div class="idea">
            <div class="icon">
                <img src="assets/img/icon.jpg">
            </div>
            <div class="text">
                <h1>Creat a MOSCoW</h1>
                <div class="alert alert-danger" role="alert">
                    Due 21th March
                </div>
            </div>
        </div>

        <div class="lines">
            <hr>
        </div>

        <br><br>

        <div class="idea">
            <div class="icon">
                <img src="assets/img/icon.jpg">
            </div>
            <div class="text">
                <h1>Project deliverable</h1>
                <div class="alert alert-danger" role="alert">
                    Due 28th March
                </div>
            </div>
        </div>

        <div class="lines">
            <hr>
        </div>

        <br><br>

        <div class="idea">
            <div class="icon">
                <img src="assets/img/icon.jpg">
            </div>
            <div class="text">
                <h1>Dot framework assignmnet</h1>
                <div class="alert alert-danger" role="alert">
                    Due 1th April
                </div>
            </div>
        </div>

        <div class="lines">
            <hr>
        </div>


        <br><br>

        <div class="idea">
            <div class="icon">
                <img src="assets/img/icon.jpg">
            </div>
            <div class="text">
                <h1>Make a presentation</h1>
                <div class="alert alert-danger" role="alert">
                    Due 10th of May
                </div>
            </div>
        </div>

        <div class="lines">
            <hr>
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
