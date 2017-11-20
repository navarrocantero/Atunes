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
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="h2"><a href="/">ATuns</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
    </nav>

    <h1>Details of : </h1>
    <form action="" method="post">

        <div class="form-group<?php echo(isset($errors['name']['required']) ? " has-error" : ""); ?>">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="track's name"
                   value="<?= (isset($track['name']) ? $track['name'] : "") ?>">
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
                   value="<?= (isset($track['art']) ? $track['artist'] : "") ?>">
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

        <div class="buttons">
            <a href="?route=delete&id=<?= $track['id'] ?>" class="btn btn-danger ">Delete</a>

            <input type="hidden" name="id" value="<?= $track['id'] ?>">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div><!-- /.container -->
</body>
</html>