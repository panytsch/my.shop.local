<?php
use helpers\SessionHelper;

$error = SessionHelper::getFlash('error');
$success = SessionHelper::getFlash('success');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/mainpage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/public/js/js.js" defer></script>
    <script>
//        window.onbeforeunload = function(e) {
//            return 'are u sure?';
//        };
    </script>
</head>
<body style="background-color: <?=COLOR?>">
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">BBC News</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="/article/analitic">Analitic</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (SessionHelper::getFlash('user',false)){?>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Hello dude</a></li>
                    <li><a href="/user/logout"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
                <?php } else {?>
                    <li><a href="/user/registration"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="/user/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="display: none" id="modalbtnmegaid">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <label for="modalbtnmegaidif">Don't show me again</label>
                <input type="checkbox" id="modalbtnmegaidif">
            </div>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="col-sm-3">
        <div class="rek__item">
            <h3>Buy tickets!</h3><br>
            <p>price only <span class="price">500</span> UAH </p>
            <a href="#">details</a>
        </div>
        <div class="rek__item">
            <h3>Buy tickets!</h3><br>
            <p>price only <span class="price">500</span> UAH </p>
            <a href="#">details</a>
        </div>
        <div class="rek__item">
            <h3>Buy tickets!</h3><br>
            <p>price only <span class="price">500</span> UAH </p>
            <a href="#">details</a>
        </div>
    </div>
    <div class="col-sm-6">
        <?=$content?>
    </div>
    <div class="col-sm-3">
        <div class="rek__item">
            <h3>Buy tickets!</h3><br>
            <p>price only <span class="price">500</span> UAH </p>
            <a href="#">details</a>
        </div>
        <div class="rek__item">
            <h3>Buy tickets!</h3><br>
            <p>price only <span class="price">500</span> UAH </p>
            <a href="#">details</a>
        </div>
        <div class="rek__item">
            <h3>Buy tickets!</h3><br>
            <p>price only <span class="price">500</span> UAH </p>
            <a href="#">details</a>
        </div>
    </div>
</div>
<script src="/public/js/rek.js"></script>
</body>
</html>