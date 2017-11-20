<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helpers.php';
include_once 'dbhelper.php';

$errors = array();
$error = false;

$track = array_fill_keys(["id", "name", "size", "total_time", "date_added", "play_date", "play_date_utc",
    "persistent_id", "track_type", "file_folder_count", "album", "genre", "location", "name", "artist"],
    "");

if (!empty($_POST)) {

    $track['id'] = htmlspecialchars(trim($_POST['id']));
    $track['name'] = htmlspecialchars(trim($_POST['name']));

    if (($track['name']) == "") {
        $errors['name']['required'] = "El campo nombre es requeridoº";
    }

    if (empty($errors)) {

        // Si no tengo errores de validación
        // Guardo en la BD

        $sql = "Insert into tracks(name ) VALUES (:name)";
        $result = $pdo->prepare($sql);

        $result->execute([
            'name' => $track['name'],
        ]);
        header('Location: home.php');
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
    <link rel="stylesheet" href="public/css/bootstrap.css"/>
    <link rel="stylesheet" href="public/css/app.css"/>
    <script src="public/js/bootstrap.js"></script>
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
                    <li class="h2"><a href="views/home.php">Tracks</a></li>
                    <li class="h2"><a href="albums.php">Albums</a></li>
                    <li class="h2"><a href="addTrack.php">Artists</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <form action="" method="post">

        <h1>ADD : </h1>

        <div class="form-group<?php echo(isset($errors['name']['required']) ? " has-error" : ""); ?>">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                   value="<?= ($error ? $track['name'] : "") ?>">
        </div>
        <?php if (isset($errors['name'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['name']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <input type="hidden" name="id" value="<?= $track['id'] ?>">
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div><!-- /.container -->
</body>
</html>