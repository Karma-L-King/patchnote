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
    <?
    
    ?>
</head>
<body>

<!-- menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">HOMES </a>
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
<!-- menu eind -->
<div class="container">
 <div class="card">
   <div class="card-head">
     <h3>NOTES</h3>
    </div>
   
  <table class="tableTasks">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                    <th>Bewerken</th>
                </tr>
                <?php
                
                         $stmttasks = $db_conn->prepare("SELECT * FROM story ");
                         $stmttasks->execute();
                           foreach($stmttasks as $rows){
                            $ids = $rows['id'];
                              echo "<tr><td>" . $rows['notes']. "</td>";
                              echo "<td>" . $rows['location']. "</td>";
                              echo "<td>" . $rows['content']. "</td>";
                              echo "<td>" . $rows['tag']. "</td>";
                            
                           }
                    ?>
            </table>
             
            
      </div>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 




</body>
</html>