<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helpers.php';
include_once 'dbhelper.php';

$errors = array();
$error = false;

$album = array_fill_keys(["name", "artist", "image", "album_type"],
    "");

if (!empty($_POST)) {

    $album['name'] = htmlspecialchars(trim($_POST['name']));
    $album['artist'] = htmlspecialchars(trim($_POST['artist']));
    $album['image'] = htmlspecialchars(trim($_POST['image']));
    $album['album_type'] = htmlspecialchars(trim($_POST['album_type']));

    if (($album['name']) == "") {
        $errors['name']['required'] = "album name required";
    }
    if (($album['artist']) == "") {
        $errors['artist']['required'] = "artist required";
    }

    if (($album['image']) == "") {
        $errors['image']['required'] = "image required";
    }

    if (($album['album_type']) == "") {
        $errors['album_type']['required'] = "album type required";
    }

    if (empty($errors)) {

        // Si no tengo errores de validación
        // Guardo en la BD

        $sql = "Insert into albums
    (name, artist, image, album_type) 
    VALUES
    (:name, :artist, :image, :album_type )";

        $result = $pdo->prepare($sql);
        $result->execute([

            'name' => $album['name'],
            'artist' => $album['artist'],
            'image' => $album['image'],
            'album_type' => $album['album_type'],

        ]);
        header('Location: index.php');
    } else {
        $error = true;
    }
}
$error = !empty($errors) ? true : false;
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

    <h1>Add new Album : </h1>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['name']['required']) ? " has-error" : ""); ?>">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Album's name"
                   value="<?= ($error ? $album['name'] : "") ?>">
        </div>
        <?php if (isset($errors['name'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['name']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['artist']['required']) ? " has-error" : ""); ?>">
            <label for="artist">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" placeholder="Artist name"
                   value="<?= ($error ? $album['artist'] : "") ?>">
        </div>
        <?php if (isset($errors['artist'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['artist']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['image']['required']) ? " has-error" : ""); ?>">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="artist" name="image" placeholder="Image url"
                   value="<?= ($error ? $album['image'] : "") ?>">
        </div>
        <?php if (isset($errors['image'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['image']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['album_type']['required']) ? " has-error" : ""); ?>">
            <label for="album_type">Album type</label>
            <input type="text" class="form-control" id="album_type" name="album_type" placeholder="Album, colecction.."
                   value="<?= ($error ? $album['album_type'] : "") ?>">
        </div>
        <?php if (isset($errors['album_type'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['album_type']['required'] ?></strong>
            </div>
        <?php endif; ?>
        <div class="buttonIndex">
            <input type="hidden" name="id" value="<?= $album['id'] ?>">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div><!-- /.container -->
</body>
</html>