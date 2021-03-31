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
    $number = count($tag);
    $number = count($content);

    $sql = "INSERT INTO note (user_id, title, content, tag) VALUES (:ph_user_id, :ph_title, :ph_content , :ph_tag)";
    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(":ph_user_id", $user);
    $stmt->bindParam(":ph_title", $title);
    $stmt->bindParam(":ph_content", $content);
    $stmt->bindParam(":ph_tag", $tag);
    var_dump($stmt->execute());

    $sql = "INSERT INTO story (date,story_title) VALUES (:ph_date ,:ph_Stitle )";
    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(":ph_Stitle", $stitle);
    $stmt->bindParam(":ph_date", $date);
    var_dump($stmt->execute());
    header("location:dashboard.php");
}
?>




<html>

<head>
    <title>PATCHNOTE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <br />
        <h2 align="center">ADD STORY</h2>
        <div class="form-group">
            <form name="add_name" id="add_name" method="post" action=" " class='form_main'>
                <div class="table-responsive">
                    <input type="hidden" name="form_user" value="<?php echo $_SESSION['id'] ?>">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr> <label for="form_storytitle" class="visually-hidden">Story Title</label>
                            <input type="title" id="form_storytitle" class="form-control" name="form_storytitle" placeholder="STORY TITLE" required autofocus>
                        </tr>
                        <tr>
                            <td> <label for="form_content" class="visually-hidden">text</label>
                                <textarea name="paragraph_text" type="text" id="form_content" class="form-control" name="form_content[]" placeholder="CONTENT" required autofocus></textarea>
                            </td>


                            <td><label for="form_tag" class="visually-hidden">tag</label>
                                <select type="tag" id="form_tag" class="form-control name_list" name="form_tag[]" placeholder="tag" required autofocus>
                                    <option value="bugfix">bugfix</option>
                                    <option value="release">release</option>
                                    <option value="update">update</option>
                                </select>
                            </td>

                            <td><button type="button" name="add" id="add" class="btn btn-success">ADD NOTE</button></td>


                            <td> <label for="form_time" class="visually-hidden">tijd</label>
                                <input type="date" id="form_time" class="form-control" name="form_date[]" placeholder="date" required>
                            </td>
                        </tr>
                    </table>
                    <input type="button" name="form_post" id="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td> <label for="form_content" class="visually-hidden">text</label><textarea name="paragraph_text" type="text" id="form_content" class="form-control" name="form_content[]" placeholder="CONTENT" required autofocus></textarea></td><td><label for="form_tag" class="visually-hidden">tag</label><select type="tag" id="form_tag" class="form-control name_list" name="form_tag[]" placeholder="tag" required autofocus><option value="bugfix">bugfix</option><option value="release">release</option><option value="update">update</option></select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                url: "name.php",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>