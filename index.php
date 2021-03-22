<?php
require "db.conn.php";
//ph = place holder 



if  (isset ($_POST['form_login'])){  
    $email = $_POST['form_email'];
    $password = $_POST['form_password'];
    $sql = "SELECT * FROM users WHERE email = :ph_email";
    $statement = $db_conn->prepare($sql);
    $statement->bindParam(":ph_email", $email);
    $statement->execute();
    $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);    
  if ($database_gegevens['password'] == $password){
            echo 'Gebruiker mag inloggen!';
            session_start();
            $_SESSION['name'] = $database_gegevens['name'];
            $_SESSION['email'] = $database_gegevens['email'];
            $_SESSION['id'] = $database_gegevens['id'];
            header("location: dashboard.php?id=$idname");
        } 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="CSS/login.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Patchnotes</title>
</head>
<body class="text-center">
    <main class="form-signin">
      <form method="post" action=" ">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <label for="form_email" class="visually-hidden">Email address</label>
        <input type="email" id="form_email" class="form-control" name="form_email" placeholder="Email address" required autofocus>
        <label for="form_password" class="visually-hidden">Password</label>
        <input type="password" id="form_password" class="form-control" name="form_password" placeholder="Password" required>
        <button class="w-100 btn btn-lg btn-primary" name="form_login" type="submit">Sign in</button> 
      </form>
    </main> 
    </body>
</html>