<?php
include "db.conn.php";
session_start();
error_reporting(0);
$noteid = $_GET['note_id'];
require "menu.php";

?>
<!doctype html>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-lab <span class="navbar-toggler-icon"></span>
            </button>
            <form class="d-flex">
                <button data-trigger="#my_offcanvas2" class="btn btn-warning" type="button" backgroundcolor="darkred"> Menu </button>
            </form>
        </div>
        </div>
    </nav>




    <body class="text-center">
        <main class="form-signin">
            <form method="post" action=" ">
                <div id='personalia'>
                    <h1 class="h3 mb-3 fw-normal">UPDATE NOTE</h1>
                    <textarea type='text' id='form_content class=' form-control' value=$content name='form_content' placeholder='CONTENT' required autofocus>
                    </textarea>
                    </br>
                    <label for='form_tag' class='visually-hidden'>
                        <h5>tag</h5>
                    </label>
                    <select type='tag' id='form_tag' class='form-control name_list' name='form_tag' value=$tag placeholder='tag' required autofocus>
                        <option style='background-color:#40adc2' value='bugfix'>bugfix</option>
                        <option style='background-color:#40adc2' value='release'>release</option>
                        <option style='background-color:#40adc2' value='update'>update</option>
                    </select>
                    <button class='w-100 btn btn-lg btn-primary' name='form_update' type='submit'>Update</button>
                </div>

                <?php

                $stmttasks = $db_conn->prepare("SELECT * FROM note");
                $stmttasks->execute();
                foreach ($stmttasks as $rows) {

                    $content = ($_POST['subject']);
                    $tag = ($_POST['subject1']);


                    var_dump(1);
                    if (isset($_POST['form_update'])) {
                        $contentV = ($_POST['subject']);
                        $tagV = ($_POST['subject1']);

                        $stmt0 = $db_conn->prepare("UPDATE note SET  content = '$contentV' WHERE id = '$uid'");
                        $stmt1 = $db_conn->prepare("UPDATE note set  tag = '$tagV' WHERE id = '$uid'");

                        $stmt0->execute();
                        $stmt1->execute();
                        var_dump(5);
                        echo "<script>window.location.href='dashboard.php';</script>";
                    }
                    var_dump(3);
                }

                ?>

            </form>
        </main>

    </body>

</html>