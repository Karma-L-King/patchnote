<?php
session_start();
include "db.conn.php";
include "menu.php";
$email = $_SESSION['email'];
$stmt = $db_conn->prepare("SELECT * FROM users WHERE email = '$email'");
$stmt->execute();
error_reporting(0);




?>


<!doctype html>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


  <!-- Custom styles for this template -->
  <link href="starter-template.css" rel="stylesheet">
</head>

<body>


  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="dashboard.php">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="d-flex">
        <button data-trigger="#my_offcanvas2" class="btn btn-warning" type="button" backgroundcolor="darkred"> Menu </button>
      </form>
    </div>
    </div>
  </nav>


  <div class="container">
    <div class="card">
      <div class="card-head">
        <h3>Mijn Profiel</h3>
      </div>
      <table class="tableTasks">
        <tr>
          <th>Naam</th>

          <th>Email</th>
          <th>password</th>

          <th>Bewerken</th>

        </tr>

        <?php
        $stmttasks = $db_conn->prepare("SELECT * FROM users WHERE email = '$email'");
        $stmttasks->execute();
        foreach ($stmttasks as $rows) {

          $idname = $rows['id'];
          echo "<tr><td>" . $rows['firstname'] . " " . $rows['lastname'] . "</td>";


          echo "<td>" . $rows['email'] . "</td>";

          echo "<td>" . $rows['password'] . "</td>";

          echo "<td><a href='updatePF.php?id=$idname'> <i class='fa fa-pencil fa-3x' aria-hidden='true'></i> </i> </i></a></td></tr>";
        }

        ?>

      </table>

    </div>
  </div>
  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>

</html>