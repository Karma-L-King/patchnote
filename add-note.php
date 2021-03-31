<?php
require "db.conn.php";
session_start();
error_reporting(0);


if (isset($_POST['form_post'])) {
  $title = $_POST['form_title'];
  $stitle = $_POST['form_storytitle'];
  $content = $_POST['form_content'];
  $tag = $_POST['form_tag'];
  $user = $_POST['form_user'];
  $date = $_POST['form_date'];

  $sql = "INSERT INTO note (user_id, title, content, tag) VALUES (:ph_user_id, :ph_title, :ph_content , :ph_tag)";

  $stmt = $db_conn->prepare($sql);
  $stmt->bindParam(":ph_user_id", $user);
  $stmt->bindParam(":ph_title", $title);
  $stmt->bindParam(":ph_content", $content);
  $stmt->bindParam(":ph_tag", $tag);
  var_dump($stmt->execute());



  header("location:dashboard.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link href="CSS/login.css" rel="stylesheet">
  <link href="CSS/nav.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>NEW NOTE</title>

</head>



<body class="text-center">

  <main class="form-signin">
    <form method="post" action=" ">
      <h1 class="h3 mb-3 fw-normal">NEW STORY!</h1>

      <input type="hidden" name="form_user" value="<?php echo
                                                    $_SESSION['id'] ?>">


      <label for="form_storytitle" class="visually-hidden">Story Title</label>
      <input type="title" id="form_storytitle" class="form-control" name="form_storytitle" placeholder="STORY TITLE" required autofocus>

      <label for="form_title" class="visually-hidden">Title</label>
      <input type="title" id="form_title" class="form-control" name="form_title" placeholder="TITLE" required autofocus>

      <label for="form_content" class="visually-hidden">text</label>
      <textarea name="paragraph_text" type="text" id="form_content" class="form-control" name="form_content" placeholder="CONTENT" required autofocus></textarea>

      <label for="form_tag" class="visually-hidden">tag</label>
      <select type="tag" id="form_tag" class="form-control" name="form_tag" placeholder="tag" required autofocus>
        <option style="color:#62e384" value="bugfix">bugfix</option>
        <option style="color:#62d6e3" value="release">release</option>
        <option style="color:#df62e3" value="update">update</option>
      </select>


      <label for="form_time" class="visually-hidden">tijd</label>
      <input type="date" id="form_time" class="form-control" name="form_date" placeholder="date" required>


      <button class="w-100 btn btn-lg btn-primary" name="form_post" type="submit">PUBLISH STORY</button>

    </form>
  </main>



</body>

</html>