<!DOCTYPE html>
<html lang="en">
<head>
    <title>Odmen Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/admin">Odmen Panel</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/">Main Page</a></li>
            <li><a href="/admin/articlelist">Article List</a></li>
            <li><a href="/admin/categorylist">Categories List</a></li>
            <li><a href="/admin/color">Set Color</a></li>
            <li><a href="/admin/logout">Logout</a></li>
            <li><a href="/admin/reklamapanel">Reklama</a></li>
            <li><a href="/admin/reklamaList">Reklama List</a></li>
            <li><a href="/admin/comments">Comments</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <?=$content?>
</div>

</body>
</html>