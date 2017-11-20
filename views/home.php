<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Atunes</title>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/app.css"/>
    <script src="../public/js/bootstrap.js"></script>
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
                    <li class="h2"><a href=" ">ATuns</a></li>
                </ul>
            </div>
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
        <?php foreach ($albums as $album): ?>
            <tr>
                <td><img src="<?= $album['image'] ?>" alt="Logo de <?= $album['name'] ?>"></td>
                <td class="row"><a href='?route=showAlbum&id=<?= $album['id'] ?>&name=<?= $album['name'] ?>'>
                        <?= $album['name'] ?></a></td>
                <td class="row"><?= $album['artist'] ?></td>
                <td class="row"><?= $album['album_type'] ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <div class="buttonIndex">
        <button type="submit" class="btn btn-success " onclick="location ='?route=addAlbum'">Add</button>
    </div>
</div><!-- /.container -->
</body>
</html>
