<?php
session_start();
include "db.conn.php";
error_reporting(0);
$userid = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link href="CSS/story.css" rel="stylesheet">
  <link href="CSS/note.css" rel="stylesheet">
  <link href="CSS/menu.css" rel="stylesheet">
  <link href="CSS/main.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
</head>

<body>

  <!-- menu -->
  <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="dashboard.php">HOME </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-notes.php">MY NOTES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-story.php">ADD STORY</a>
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
  <!-- menu eind -->

  <div align="center" class="container">
    <div class="card">
      <div class="card-head">
        <h3>NOTES</h3>
      </div>
      <selection class="story">
        <?php
        $stmttasks = $db_conn->prepare("SELECT * FROM story ORDER BY id ");
        $stmttasks->execute();
        foreach ($stmttasks as $rows) {
          $ids = $rows['story_id'];
          echo "<div class='story'>";
          echo "<h2>" . $rows['story_title'] . "</h2>";
          echo "<h3>" . $rows['date'] . "</h3>";

          $stmttasks = $db_conn->prepare("SELECT * FROM note WHERE story_id='" . $rows['id'] . "' ORDER BY story_id ");
          $stmttasks->execute();
          foreach ($stmttasks as $rows) {
            $id = $rows['id'];
            echo "<div class='box'>";
            echo "<h3>" . $rows['title'] . "</h3>";
            echo "<p>" . $rows['content'] . "</p>";
            echo "<div id='tag'><a>" . $rows['tag'] . "</a></div>";
            echo  "";
            echo "</div>";
          }

          echo "</div>";
          //"<button href='edit-note.php?story_id=$id'>";
        }
        ?>
      </selection>
    </div>

  </div>
  <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>