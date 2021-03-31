<?php
include "db.conn.php";
session_start();
error_reporting(0);
$usersid = $_GET['id'];
require "menu.php";

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
  <!-- <link href="CSS/tasks.css" rel="stylesheet"> -->
  <title>PATCHNOTE</title>
  <link href="CSS/story.css" rel="stylesheet">
  <link href="CSS/note.css" rel="stylesheet">
  <link href="CSS/menu.css" rel="stylesheet">
  <link href="CSS/main.css" rel="stylesheet">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">


  <!-- Bootstrap core CSS -->
  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">
</head>

<body>


  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-lab <span class="navbar-toggler-icon"></span>
      </button>
      <form class="d-flex">
        <button data-trigger="#my_offcanvas2" class="btn btn-warning" type="button" backgroundcolor="darkred"> Menu </button>
      </form>
    </div>
    </div>
  </nav>




  <body class="text-center">
    <main class="form-signin">
      <form method="post" action=" ">


        <?php



        $stmttasks = $db_conn->prepare("SELECT * FROM users WHERE id = '$usersid'");
        $stmttasks->execute();
        foreach ($stmttasks as $rows) {
          $uid = $rows['id'];
          $voornaam = $rows['firstname'];
          $achternaam = $rows['lastname'];
          $password = $rows['password'];
          $emailpf = $rows['email'];
          echo "<div id='personalia'>";
          echo '<h1 class="h3 mb-3 fw-normal">UPDATE PROFILE</h1>';
          echo "<input type='text' placeholder='FIRSTNAME' class='form-control' name='subject' id='subject' value='$voornaam'>";
          echo "<input type='text' placeholder='LASTNAME' class='form-control' name='subject1' id='subject1' value='$achternaam'>";
          echo "<input type='text' placeholder='PASSWORD' class='form-control' name='subject2' id='subject2' value='$password'>";
          echo "<input type='text' placeholder='EMAIL' class='form-control' name='subject3' id='subject3' value='$emailpf'>";
          echo '<button class="w-100 btn btn-lg btn-primary" name="form_update" type="submit">Update</button>';
          echo "</div>";
        }


        $voornaamv = ($_POST['subject']);
        $achternaamv = ($_POST['subject1']);
        $passwordv = ($_POST['subject2']);
        $emailpfv = ($_POST['subject3']);


        header("location:dashboard.php");
        $stmt0 = $db_conn->prepare("UPDATE users SET firstname = '$voornaamv' ,lastname = '$achternaamv',password = '$passwordv' , email = '$emailpfv' WHERE id = '$uid'");





        $stmt0->execute();

        //



        ?>


      </form>
    </main>

  </body>

</html>