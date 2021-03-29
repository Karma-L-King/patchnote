<?php
require "db.conn.php";
session_start();
error_reporting(0);
$usersid = $_GET['id'];
?>
<!doctype html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
  <body class="text-center">   
    <main class="form-signin">
      <form method="post" action=" ">

   <!-- menu -->   
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">HOME </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mynotes">MY NOTES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mynotes">ADD NOTE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">PROFILE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>
<!-- einde menu -->
      <?php

      $stmttasks = $db_conn->prepare("SELECT * FROM users WHERE id = '$usersid'");
      $stmttasks->execute();
        foreach($stmttasks as $rows){
         $uid = $rows['id'];
         $voornaam = $rows['firstname'];
         $achternaam = $rows['lastname'];
         $password = $rows['password'];
         $emailpf = $rows['email'];

          echo '<h1 class="h3 mb-3 fw-normal">plan a task</h1>';
          echo "<input type='text' class='form-control' name='subject' id='subject' value='$voornaam'>";
          echo "<input type='text' class='form-control' name='subject1' id='subject1' value='$achternaam'>";
          echo "<input type='text' class='form-control' name='subject2' id='subject2' value='$password'>";
          echo "<input type='text' class='form-control' name='subject3' id='subject3' value='$emailpf'>";
          echo '<button class="w-100 btn btn-lg btn-primary" name="form_update" type="submit">Update</button>';
        }
      
    
      $voornaamv = ($_POST['subject']);
      $achternaamv = ($_POST['subject1']);
      $passwordv = ($_POST['subject2']);
      $emailpfv = ($_POST['subject3']);

      
      
      $stmt0 = $db_conn->prepare("UPDATE users SET firstname = '$voornaamv' WHERE id = '$uid'");
      $stmt1 = $db_conn->prepare("UPDATE users SET lastname = '$achternaamv' WHERE id = '$uid'");
      $stmt2 = $db_conn->prepare("UPDATE users SET password = '$passwordv' WHERE id = '$uid'");
      $stmt3 = $db_conn->prepare("UPDATE users SET email = '$emailpfv' WHERE id = '$uid'");
    


     
      $stmt0->execute();
      $stmt1->execute();
      $stmt2->execute();
      $stmt3->execute();
 



       ?>
        
        
      </form>
    </main>
 
  </body>
</html>
      



