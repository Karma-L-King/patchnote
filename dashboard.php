<?php
session_start();
include "db.conn.php";
$userid = $_SESSION['id'];
require "menu.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
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
      <a class="navbar-brand" href="dashboard.php">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="d-flex">
        <button data-trigger="#my_offcanvas2" class="btn btn-warning" type="button" backgroundcolor="darkred"> MENU </button>
      </form>
    </div>
    </div>
  </nav>
  <div align="center" class="container" id="cup">
    <div class="card">
      <div id="sheet">
        <h3>NOTES</h3>
      </div>
      <selection id="stories" class="story">
        <?php
        $stmttasks = $db_conn->prepare("SELECT * FROM story ORDER BY id ");
        $stmttasks->execute();
        foreach ($stmttasks as $rows) {
          echo "<div class='story'>";
          echo "<h2>" . $rows['story_title'] . "</h2>";
          echo "<h3>" . $rows['date'] . "</h3>";
          $stmttasks = $db_conn->prepare("SELECT * FROM note WHERE story_id='" . $rows['id'] . "' ORDER BY story_id ");
          $stmttasks->execute();
          foreach ($stmttasks as $rows) {
            echo "<div class='box'>";
            echo "<h3>" . $rows['title'] . "</h3>";
            echo "<p>" . $rows['content'] . "</p>";
            echo "<div id='tag'><a>" . $rows['tag'] . "</a>";
            echo  "</div>";
            echo "</div>";
          }
          echo "</div>";
        }
        ?>
      </selection>
    </div>
  </div>
  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>