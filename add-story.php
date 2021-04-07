<?php
include "db.conn.php";
session_start();
require "menu.php";
?>

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



  <?

if (isset($_POST['form_post'])) {

  $stitle = $_POST['form_storytitle'];
  $content = $_POST['form_content'];
  $tag = $_POST['form_tag'];
  $user = $_POST['form_user'];
  $date = $_POST['form_date'];

  $sql = "INSERT INTO story (date, story_title) VALUES (:ph_date ,:ph_stitle )";
  $stmt = $db_conn->prepare($sql);
  $stmt->bindParam(":ph_date", $date);
  $stmt->bindParam(":ph_stitle", $stitle);
  $stmt->execute();

  $story = $db_conn->lastInsertId();

  $notes = array();
  if ($tag && is_array($tag) && $content && is_array($content) && count($tag) === count($content)) {
    for ($i = 0; $i < count($tag); $i++) {
      $notes[] = array(
        'tag' => $tag[$i],
        'content' => $content[$i],
        'user_id' => $user,
        'story_id' => $story
      );
    }
  }

  foreach ($notes as $key => $note) {
    $sql = "INSERT INTO note (user_id, story_id, content, tag) VALUES (:user_id, :story_id, :content, :tag)";
    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(":user_id", $note['user_id']);
    $stmt->bindParam(":story_id", $note['story_id']);
    $stmt->bindParam(":content", $note['content']);
    $stmt->bindParam(":tag", $note['tag']);
    $stmt->execute();
  }

  header("location:dashboard.php");
}

//
//     $sql = "INSERT INTO note (tag, content, user_id)  VALUES( :ph_content,:ph_tag,:ph_user_id)";
//     $sql2 = "INSERT INTO story (date, story_title) VALUES (:ph_date ,:ph_Stitle )";
//     $stmt = $db_conn->prepare($sql);
//     $stmt = $db_conn->prepare($sql2);
//     $stmt->bindParam("ph_content", $content);
//     $stmt->bindParam("ph_tag", $tag);
//     $stmt->bindParam(":ph_user_id", $user);
//  
//
//  }
//}
?>



  <html>

  <head>
    <title>PATCHNOTE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </head>

  <body>
    <div class="container">
      <br />
      <br />
      <h2 align="center">ADD STORY</h2>
      <div class="form-group">
        <form name="add_name" id="add_name" method="post" action="" class='form_main'>
          <div class="table-responsive">
            <input type="hidden" name="form_user" value="<?php echo $_SESSION['id']; ?>">
            <table class="table table-bordered" id="dynamic_field">
              <tr> <label for="form_storytitle" class="visually-hidden">Story Title</label>
                <input type="title" id="form_storytitle" class="form-control" name="form_storytitle" placeholder="STORY TITLE" required autofocus>
              </tr>
              <tr>
                <td> <label for="form_content" class="visually-hidden">text</label>
                  <textarea type="text" id="form_content[]" class="form-control" name="form_content[]" placeholder="CONTENT" required autofocus></textarea>
                </td>


                <td><label for="form_tag" class="visually-hidden">tag</label>
                  <select type="tag" id="form_tag[]" class="form-control name_list" name="form_tag[]" placeholder="tag" required autofocus>
                    <option style="background-color:#40adc2" value="bugfix">bugfix</option>
                    <option style="background-color:#40adc2" value="release">release</option>
                    <option style="background-color:#40adc2" value="update">update</option>
                  </select>
                </td>

                <td><button type="button" name="add" id="add" class="btn btn-success">ADD NOTE</button></td>


                <td> <label for="form_date" class="visually-hidden">tijd</label>
                  <input type="date" id="form_date" class="form-control" name="form_date" placeholder="date" required>
                </td>
              </tr>
            </table>
            <button type="submit" id="form_post" name="form_post" class="w-100 btn btn-lg btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </body>
  <!-- kan later mogelijk problemen zijn in script door name paragraph_text keep in mind -->

  </html>
  <script>
    $(document).ready(function() {
      var i = 1;
      $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i + '"><td><label for="form_content[]" class="visually-hidden">text</label><textarea type="text" id="form_content[]" class="form-control" name="form_content[]" placeholder="CONTENT" required autofocus></textarea></td><td><label for="form_tag" class="visually-hidden">tag</label><select type="tag" id="form_tag[]" class="form-control name_list" name="form_tag[]" placeholder="tag" required autofocus><option style="background-color:#62e384" value="bugfix">bugfix</option><option style="background-color:#62d6e3" value="release">release</option><option style="background-color:#df62e3" value="update">update</option></select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      // remove button
      $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
      });
      //

    });
  </script>