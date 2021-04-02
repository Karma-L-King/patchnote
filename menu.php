<?php

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="htmlcss bootstrap offcanvas script, navbar, mega menu examples" />
    <meta name="description" content="Bootstrap offcanvas examples for any type of project, Bootstrap 4" />


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        // JS START
        $(document).ready(function() {

            $("[data-trigger]").on("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                var offcanvas_id = $(this).attr('data-trigger');
                $(offcanvas_id).toggleClass("show");
                $('body').toggleClass("offcanvas-active");
                $(".screen-overlay").toggleClass("show");

            });


            // Close menu when pressing ESC
            $(document).on('keydown', function(event) {
                if (event.keyCode === 27) {
                    $(".offcanvas").removeClass("show");
                    $("body").removeClass("overlay-active");
                }
            });

            $(".btn-close, .screen-overlay").click(function(e) {
                $(".screen-overlay").removeClass("show");
                $(".offcanvas").removeClass("show");
                $("body").removeClass("offcanvas-active");


            });

        });
    </script>
    <!-- JS EINDE -->



    <!-- CSS START -->
    <style type="text/css">
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            display: flex;
            margin-left: auto;
        }

        .btn-primary {
            color: #fff;
            background-color: #F6AA1C;
            border-color: #007bff;
        }


        .offcanvas-active {
            overflow: hidden;
        }

        .screen-overlay {
            width: 0%;
            height: 100%;
            z-index: 30;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0;
            visibility: hidden;
            background-color: rgba(34, 34, 34, 0.6);
            transition: opacity .2s linear, visibility .1s, width 1s ease-in;
        }

        .screen-overlay.show {
            transition: opacity .5s ease, width 0s;
            opacity: 1;
            width: 100%;
            visibility: visible;
        }

        .offcanvas {
            width: 350px;
            visibility: hidden;
            transform: translateX(-100%);
            transition: all .2s;
            border-radius: 0;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 1200;
            background-color: #fff;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .offcanvas.offcanvas-right {
            right: 0;
            left: auto;
            transform: translateX(100%);
        }

        .offcanvas.show {
            visibility: visible;
            transform: translateX(0);
            transition: transform .2s;
        }

        .offcanvas .btn-close {
            position: absolute;
            right: 15px;
            top: 15px;
        }
    </style>
    <!-- CSS EINDE  -->
</head>

<body>




    <b class="screen-overlay"></b>

    <!-- offcanvas panel right -->
    <aside class="offcanvas offcanvas-right" id="my_offcanvas2">
        <header class="p-4 bg-light border-bottom">
            <button class="btn btn-outline-danger btn-close"> &times Close </button>
            <h6 class="mb-0">Menu </h6>
        </header>
        <nav class="list-group list-group-flush">
            <a href="dashboard.php" class="list-group-item">HOME</a>
            <a href="profile.php" class="list-group-item">PROFILE</a>
            <a href="my-notes.php" class="list-group-item">MY NOTES</a>
            <a href="add-story.php" class="list-group-item">NEW STORY</a>
            <a href="logout.php" id="logout" class="list-group-item">LOG OUT</a>
        </nav>
    </aside>
    <!-- offcanvas panel right .end -->



    </div>
    </header>
</body>

</html>