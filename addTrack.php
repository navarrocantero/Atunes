<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helpers.php';
include_once 'dbhelper.php';

$errors = array();
$error = false;

$track = array_fill_keys(["name", "size", "total_time", "date_added", "play_date", "play_date_utc",
    "persistent_id", "track_type", "file_folder_count", "album", "genre", "location", "name", "artist", "rating"],
    "");

if (!empty($_POST)) {

    $track['name'] = htmlspecialchars(trim($_POST['name']));
    $track['size'] = htmlspecialchars(trim($_POST['size']));
    $track['total_time'] = htmlspecialchars(trim($_POST['total_time']));
    $track['date_added'] = htmlspecialchars(trim($_POST['date_added']));
    $track['play_date'] = htmlspecialchars(trim($_POST['play_date']));
    $track['play_date_utc'] = htmlspecialchars(trim($_POST['play_date_utc']));
    $track['persistent_id'] = htmlspecialchars(trim($_POST['persistent_id']));
    $track['track_type'] = htmlspecialchars(trim($_POST['track_type']));
    $track['file_folder_count'] = htmlspecialchars(trim($_POST['file_folder_count']));
    $track['album'] = htmlspecialchars(trim($_POST['album']));
    $track['genre'] = htmlspecialchars(trim($_POST['genre']));
    $track['location'] = htmlspecialchars(trim($_POST['location']));
    $track['artist'] = htmlspecialchars(trim($_POST['artist']));
    $track['rating'] = htmlspecialchars(trim($_POST['rating']));

    if (($track['name']) == "") {
        $errors['name']['required'] = "El campo nombre es requeridoº";
    }

    if (($track['artist']) == "") {
        $errors['artist']['required'] = "El campo artista es requerido";
    }

    if (($track['rating']) == "") {
        $errors['rating']['required'] = "El campo rating es requerido";
    }


    if (((int)(($track['rating'])) > 5) || (int)(($track['rating'])) < 0) {
        $errors['rating']['required'] = "Rating debe estar entre 0 y 5";
    }

    if (($track['size']) == "") {
        $errors['size']['required'] = "El campo size es requerido";
    }
    if (($track['total_time']) == "") {
        $errors['total_time']['required'] = "El campo total_time es requerido";
    }
    if (($track['date_added']) == "") {
        $errors['date_added']['required'] = "El campo date_added es requerido";
    }
    if (($track['play_date']) == "") {
        $errors['play_date']['required'] = "El campo play_date es requerido";
    }
    if (($track['play_date_utc']) == "") {
        $errors['play_date_utc']['required'] = "El campo play_date_utc es requerido";
    }
    if (($track['persistent_id']) == "") {
        $errors['persistent_id']['required'] = "El campo persistent_id es requerido";
    }
    if (($track['track_type']) == "") {
        $errors['track_type']['required'] = "El campo track_type es requerido";
    }
    if (($track['file_folder_count']) == "") {
        $errors['file_folder_count']['required'] = "El campo file_folder_count es requerido";
    }
    if (($track['album']) == "") {
        $errors['album']['required'] = "El campo album es requerido";
    }
    if (($track['genre']) == "") {
        $errors['genre']['required'] = "El campo genre es requerido";
    }
    if (($track['location']) == "") {
        $errors['location']['required'] = "El campo location es requerido";
    }


    if (empty($errors)) {

        // Si no tengo errores de validación
        // Guardo en la BD

        $sql = "Insert into tracks
    (name, artist, size, total_time, date_added, play_date,
    play_date_utc ,persistent_id ,track_type , file_folder_count,
    album,genre,location,rating) 
    VALUES
    (:name, :artist, :size, :total_time, :date_added, :play_date,
    :play_date_utc, :persistent_id, :track_type,
    :file_folder_count, :album, :genre, :location ,:rating)";

        $result = $pdo->prepare($sql);
        $result->execute([

            'name' => $track['name'],
            'artist' => $track['artist'],
            'size' => $track['size'],
            'total_time' => $track['total_time'],
            'date_added' => $track['date_added'],
            'play_date' => $track['play_date'],
            'play_date_utc' => $track['play_date_utc'],
            'persistent_id' => $track['persistent_id'],
            'track_type' => $track['track_type'],
            'file_folder_count' => $track['file_folder_count'],
            'album' => $track['album'],
            'genre' => $track['genre'],
            'location' => $track['location'],
            'rating' => $track['rating']

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

    <h1>ADD : </h1>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['name']['required']) ? " has-error" : ""); ?>">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="track's name"
                   value="<?= ($error ? $track['name'] : "") ?>">
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
            <input type="text" class="form-control" id="artist" name="artist" placeholder="artist"
                   value="<?= ($error ? $track['artist'] : "") ?>">
        </div>
        <?php if (isset($errors['artist'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['artist']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['rating']['required']) ? " has-error" : ""); ?>">
            <label for="rating">rating</label>
            <input type="number" class="form-control" id="rating" name="rating" placeholder="0 => 5"
                   value="<?= ($error ? $track['rating'] : "") ?>">
        </div>
        <?php if (isset($errors['rating'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['rating']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <div class="form-group<?php echo(isset($errors['size']['required']) ? " has-error" : ""); ?>">
            <label for="size">Size</label>
            <input type="number" class="form-control" id="size" name="size" placeholder="in KB"
                   value="<?= ($error ? $track['size'] : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['size']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['total_time']['required']) ? " has-error" : ""); ?>">
            <label for="Total_time">Total_time</label>
            <input type="number" class="form-control" id="total_time" name="total_time" placeholder="in MS"
                   value="<?= ($error ? $track['total_time'] : "") ?>">
        </div>
        <?php if (isset($errors['total_time'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['total_time']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['date_added']['required']) ? " has-error" : ""); ?>">
            <label for="date_added">date_added</label>
            <input type="date" class="form-control" id="date_added" name="date_added" placeholder="date_added"
                   value="<?= ($error ? $track['date_added'] : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['date_added']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <div class="form-group<?php echo(isset($errors['play_date']['required']) ? " has-error" : ""); ?>">
            <label for="play_date">play_date</label>
            <input type="date" class="form-control" id="play_date" name="play_date" placeholder="play_date"
                   value="<?= ($error ? $track['play_date'] : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['play_date']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['play_date_utc']['required']) ? " has-error" : ""); ?>">
            <label for="play_date_utc">play_date_utc</label>
            <input type="date" class="form-control" id="play_date_utc" name="play_date_utc" placeholder="play_date_utc"
                   value="<?= ($error ? $track['play_date_utc'] : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['play_date']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <div class="form-group<?php echo(isset($errors['persistent_id']['required']) ? " has-error" : ""); ?>">
            <label for="persistent_id">persistent_id</label>
            <input type="number" class="form-control" id="persistent_id" name="persistent_id"
                   placeholder="persistent_id"
                   value="<?= ($error ? $track['persistent_id'] : "") ?>">
        </div>
        <?php if (isset($errors['persistent_id'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['persistent_id']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <div class="form-group<?php echo(isset($errors['track_type']['required']) ? " has-error" : ""); ?>">
            <label for="track_type">track_type</label>
            <input type="text" class="form-control" id="track_type" name="track_type" placeholder="track_type"
                   value="<?= ($error ? $track['track_type'] : "") ?>">
        </div>
        <?php if (isset($errors['track_type'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['track_type']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['file_folder_count']['required']) ? " has-error" : ""); ?>">
            <label for="file count">file_folder_count</label>
            <input type="number" class="form-control" id="file_folder_count" name="file_folder_count"
                   placeholder="file_folder_count"
                   value="<?= ($error ? $track['file_folder_count'] : "") ?>">
        </div>
        <?php if (isset($errors['file_folder_count'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['file_folder_count']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <div class="form-group<?php echo(isset($errors['album']['required']) ? " has-error" : ""); ?>">
            <label for="album">album</label>
            <input type="text" class="form-control" id="album" name="album" placeholder="album"
                   value="<?= ($error ? $track['album'] : "") ?>">
        </div>
        <?php if (isset($errors['album'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['album']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <div class="form-group<?php echo(isset($errors['genre']['required']) ? " has-error" : ""); ?>">
            <label for="genre">genre</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="genre"
                   value="<?= ($error ? $track['genre'] : "") ?>">
        </div>
        <?php if (isset($errors['genre'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['genre']['required'] ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-group<?php echo(isset($errors['location']['required']) ? " has-error" : ""); ?>">
            <label for="location">location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="location"
                   value="<?= ($error ? $track['location'] : "") ?>">
        </div>
        <?php if (isset($errors['location'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['location']['required'] ?></strong>
            </div>
        <?php endif; ?>


        <input type="hidden" name="id" value="<?= $track['id'] ?>">
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div><!-- /.container -->
</body>
</html>