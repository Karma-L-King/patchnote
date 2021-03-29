<?php

/// 11:17 even laten ik kom er niet uit warom de notes niet worden vertsuurd dus ik ga werken aan de lay out van dashboard tot ik weer op een idee kom ///

require "db.conn.php";
session_start();
error_reporting(0);
$number = count($_POST['form_tag']);
$number = count($_POST['form_content']);
if (isset($_POST['form_post'])) {
  $title = $_POST['form_title'];
  $stitle = $_POST['form_storytitle'];
  $content = $_POST['form_content'];
  $tag = $_POST['form_tag'];
  $user = $_POST['form_user'];
  $date = $_POST['form_date'];
  $story = $_POST['form_story'];


  if ($number > 0) {
    for ($i = 0; $i < $number; $i++) {
      $sql = "INSERT INTO note (user_id, story_id , title, content, tag) VALUES (:ph_user_id, :ph_story_id,:ph_title, :ph_content , :ph_tag)";
      $stmt = $db_conn->prepare($sql);
      $stmt->bindParam(":ph_user_id", $user);
      $stmt->bindParam(":ph_story_id", $story);
      $stmt->bindParam(":ph_title", $title);
      $stmt->bindParam(":ph_content", $content);
      $stmt->bindParam(":ph_tag", $tag);
      var_dump($stmt->execute());
    }
  }

  $sql = "INSERT INTO story (id ,date, story_title) VALUES (:ph_story_id,:ph_date ,:ph_stitle )";
  $stmt = $db_conn->prepare($sql);
  $stmt->bindParam(":ph_story_id", $story);
  $stmt->bindParam(":ph_date", $date);
  $stmt->bindParam(":ph_stitle", $stitle);
  var_dump($stmt->execute());
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
          <input type="hidden" name="form_story" value="">
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
                  <option value="bugfix">bugfix</option>
                  <option value="release">release</option>
                  <option value="update">update</option>
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
      $('#dynamic_field').append('<tr id="row' + i + '"><td> <label for="form_content" class="visually-hidden">text</label><textarea name="paragraph_text" type="text" id="form_content" class="form-control" name="form_content[]" placeholder="CONTENT" required autofocus></textarea></td><td><label for="form_tag" class="visually-hidden">tag</label><select type="tag" id="form_tag" class="form-control name_list" name="form_tag[]" placeholder="tag" required autofocus><option value="bugfix">bugfix</option><option value="release">release</option><option value="update">update</option></select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    // remove button
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });
    //

  });
</script>