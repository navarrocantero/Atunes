<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helpers.php';
$queryResult = $pdo->query("SELECT * from  albums  ");

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
                    <li class="h2"><a href="index.php">ATuns</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <h1></h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Artist</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
              <td><img src="<?=$row['image']?>" alt="Logo de <?=$row['name']?>"></td>
                <td class="row"><a href='showAlbum.php?name=<?= $row['name']?>&id=<?= $row['id']?>'>
                        <?= $row['name'] ?></a></td>
                <td class="row"><?= $row['artist'] ?></td>
                <td class="row"><?= $row['album_type'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <div class="buttonIndex">
        <button type="submit" class="btn btn-success " onclick="location ='addAlbum.php '">Add</button>
    </div>
</div><!-- /.container -->
</body>
</html>
