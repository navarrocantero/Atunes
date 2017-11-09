<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helpers.php';
$queryResult = $pdo->query("SELECT * from  tracks    ");

?>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Atunes</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/app.css"/>
    <script src="js/bootstrap.js"></script>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header  ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="h2"><a href="#">Tracks</a></li>
                    <li class="h2"><a href="#">Albums</a></li>
                    <li class="h2"><a href="#">Artists</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <h1>Tracks</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Rating</th>
            <th>Genre</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)): ?>
            <tr onclick="location = 'details.php?id=<?= $row['id'] ?>'">
                <td class="row"><?= $row['name'] ?></td>
                <td class="row"><?= $row['artist'] ?></td>
                <td class="row"><?= $row['album'] ?></td>
                <td class="row"><?= $row['rating'] ?></td>
                <td class="row"><?= $row['genre'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-success" onclick="location ='details.php '">Add</button>
</div><!-- /.container -->
</body>
</html>
