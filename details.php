<?php
include_once 'config.php';
include_once 'connectdb.php';
include_once 'helpers.php';
include_once 'dbhelper.php';

$errors = array();
$error = false;
$control = false;


if (!empty($_REQUEST)) {
    $id = $_REQUEST['id'];
    $track = getSqlResult($id, $pdo);

    // Aqui se carga la row track

    // Valores NOT NULL
    $size = getValue($track, "size");
    $total_time = getValue($track, "total_time");
    $date_added = getValue($track, "date_added");
    $play_date = getValue($track, "play_date_utc");
    $play_date_utc = getValue($track, "play_date_utc");
    $persistent_id = getValue($track, "persistent_id");
    $track_type = getValue($track, "track_type");
    $file_folder_count = getValue($track, "file_folder_count");
    $album = getValue($track, "album");
    $genre = getValue($track, "genre");
    $location = getValue($track, "location");
    $name = getValue($track, "name");
    $artist = getValue($track, "artist");


    // Valores que pueden ser nulos
//    $track_number = getValue($track, "track_number");
//    $bpm = getValue($track, "bpm");
//    $date_modified = getValue($track, "date_modified");
//    $bit_rate = getValue($track, "bit_rate");
//    $sample_rate = getValue($track, "sample_rate");
//    $play_count = getValue($track, "play_count");
//    $skip_count = getValue($track, "skip_count");
//    $skip_date = getValue($track, "skip_date");
//    $rating = getValue($track, "rating");
//    $rating_computed = getValue($track, "rating_computed");
//    $compilation = getValue($track, "compilation");
//    $artwork_count = getValue($track, "artwork_count");
//    $album_artist = getValue($track, "album_artist");
//    $kind = getValue($track, "sort_album_list");
//    $library_folder_count = getValue($track, "library_folder_count");
//    $sort_album_list = getValue($track, "sort_album_list");

    if ($name == "") {
        $errors['name']['required'] = "El campo nombre es requerido";
    }
    if ($artist == "") {
        $errors['artist']['required'] = "El campo artista es requerido";
    }
    if ($size == "") {
        $errors['size']['required'] = "El campo size es requerido";
    }
    if ($total_time == "") {
        $errors['total_time']['required'] = "El campo total_time es requerido";
    }
    if ($date_added == "") {
        $errors['date_added']['required'] = "El campo date_added es requerido";
    }
    if ($play_date == "") {
        $errors['play_date']['required'] = "El campo play_date es requerido";
    }
    if ($play_date_utc == "") {
        $errors['play_date_utc']['required'] = "El campo play_date_utc es requerido";
    }
    if ($persistent_id == "") {
        $errors['persistent_id']['required'] = "El campo persistent_id es requerido";
    }
    if ($track_type == "") {
        $errors['track_type']['required'] = "El campo track_type es requerido";
    }
    if ($file_folder_count == "") {
        $errors['file_folder_count']['required'] = "El campo file_folder_count es requerido";
    }
    if ($album == "") {
        $errors['album']['required'] = "El campo album es requerido";
    }
    if ($genre == "") {
        $errors['genre']['required'] = "El campo genre es requerido";
    }
    if ($location == "") {
        $errors['location']['required'] = "El campo location es requerido";
    }

    if (empty($errors)) {
        // Si no tengo errores de validación
        // Guardo en la BD
        $sql = "INSERT INTO tracks (name,artist,size,total_time,date_added,play_date,play_date_utc,persistent_id,track_type,file_folder_count,album,genre,location) VALUES (:name, :artist, :size,:total_time, :date_added, :play_date, :play_date_utc, :persistent_id,  :track_type, :filder_folder_count, :album, :genre, :location )";

        $result = $pdo->prepare($sql);

        $result->execute([
            'name' => $name,
            'artist' => $artist,
            'size' => $size,
            'total_time' => $total_time,
            'date_added' => $date_added,
            'play_date' => $play_date,
            'play_date_utc' => $play_date_utc,
            'persistent_id' => $persistent_id,
            'track_type' => $track_type,
            'file_folder_count' => $file_folder_count,
            'album' => $album,
            'genre' => $genre,
            'location' => $location,
        ]);
        header('Location: index.php');
    } else {
        $error = true;
    }
}
$error = empty($errors) ? true : false;
unset($errors)
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
                    <li class="h2"><a href="index.php">Tracks</a></li>
                    <li class="h2"><a href="albums.php">Albums</a></li>
                    <li class="h2"><a href="add.php">Artists</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <h1>Details of : </h1>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['name']['required']) ? " has-error" : ""); ?>">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                   value="<?= ($error ? $name : "") ?>">
        </div>
        <?php if (isset($errors['name'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['name']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['artist']['required']) ? " has-error" : ""); ?>">
            <label for="artist">Artist</label>
            <input type="text" class="form-control" id="artist" name="total_time" placeholder="artist"
                   value="<?= ($error ? $artist : "") ?>">
        </div>
        <?php if (isset($errors['total_time'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['artist']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['size']['required']) ? " has-error" : ""); ?>">
            <label for="Size">Size</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="size"
                   value="<?= ($error ? $size : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['size']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['total_time']['required']) ? " has-error" : ""); ?>">
            <label for="Total_time">Total_time</label>
            <input type="text" class="form-control" id="total_time" name="total_time" placeholder="total_time"
                   value="<?= ($error ? $total_time : "") ?>">
        </div>
        <?php if (isset($errors['total_time'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['total_time']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['date_added']['required']) ? " has-error" : ""); ?>">
            <label for="date_added">date_added</label>
            <input type="text" class="form-control" id="date_added" name="date_added" placeholder="date_added"
                   value="<?= ($error ? $date_added : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['date_added']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['play_date']['required']) ? " has-error" : ""); ?>">
            <label for="play_date">play_date</label>
            <input type="text" class="form-control" id="play_date" name="play_date" placeholder="play_date"
                   value="<?= ($error ? $play_date : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['play_date']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['play_date_utc']['required']) ? " has-error" : ""); ?>">
            <label for="play_date_utc">play_date_utc</label>
            <input type="text" class="form-control" id="play_date_utc" name="play_date_utc" placeholder="play_date_utc"
                   value="<?= ($error ? $play_date_utc : "") ?>">
        </div>
        <?php if (isset($errors['date_added'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['play_date']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['persistent_id']['required']) ? " has-error" : ""); ?>">
            <label for="persistent_id">persistent_id</label>
            <input type="text" class="form-control" id="persistent_id" name="persistent_id" placeholder="persistent_id"
                   value="<?= ($error ? $persistent_id : "") ?>">
        </div>
        <?php if (isset($errors['persistent_id'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['persistent_id']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['track_type']['required']) ? " has-error" : ""); ?>">
            <label for="track_type">track_type</label>
            <input type="text" class="form-control" id="track_type" name="track_type" placeholder="track_type"
                   value="<?= ($error ? $track_type : "") ?>">
        </div>
        <?php if (isset($errors['track_type'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['track_type']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['file_folder_count']['required']) ? " has-error" : ""); ?>">
            <label for="file count">file_folder_count</label>
            <input type="text" class="form-control" id="file_folder_count" name="file_folder_count"
                   placeholder="file_folder_count"
                   value="<?= ($error ? $file_folder_count : "") ?>">
        </div>
        <?php if (isset($errors['file_folder_count'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['file_folder_count']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['album']['required']) ? " has-error" : ""); ?>">
            <label for="album">album</label>
            <input type="text" class="form-control" id="album" name="album" placeholder="album"
                   value="<?= ($error ? $album : "") ?>">
        </div>
        <?php if (isset($errors['album'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['album']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['genre']['required']) ? " has-error" : ""); ?>">
            <label for="genre">genre</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="genre"
                   value="<?= ($error ? $genre : "") ?>">
        </div>
        <?php if (isset($errors['genre'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['genre']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['location']['required']) ? " has-error" : ""); ?>">
            <label for="location">location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="location"
                   value="<?= ($error ? $location : "") ?>">
        </div>
        <?php if (isset($errors['location'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <strong><?= $errors['location']['required'] ?></strong>
            </div>
        <?php endif; ?>
    </form>

    <button type="submit" class="btn btn-danger" onclick="location ='delete.php?id+ '>Delete</button>

    <button type=" submit
    " class="btn btn-success">Submit</button>

</div><!-- /.container -->
</body>
</html>