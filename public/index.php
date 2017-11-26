<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 14/11/2017
 * Time: 00:02
 */
require_once '../vendor/autoload.php'; 
use Phroute\Phroute\RouteCollector;

include_once '../config.php';
include_once '../connectdb.php';
include_once '../helpers.php';
include_once '../dbhelper.php';

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);

$route = $_GET['route'] ?? "/";
function render($fileName, $params = [])
{
    // Activa el buffer interno de PHP para que toda la salida que va al navegador
    // se guarde en dicho buffer interno.
    ob_start(); // Omite cualquier salida de la aplicación y la almacena internamente

    extract($params); // Extrae los datos del array asociativo $params y los convierte en variables

    require($fileName);
    return ob_get_clean(); // Se trae los datos del buffer interno y lo limpia
}
$router = new RouteCollector();

$router->controller('/', App\Controllers\HomeController::class);
$router->controller('/album', App\Controllers\AlbumController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$method = $_REQUEST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$response = $dispatcher->dispatch($method, $route);
echo $response;
//Home
//$router->get('/', function () use ($pdo) {
//
//    $query = $pdo->query("SELECT * from  albums  ");
//
//    $query->execute();
//
//    // $distros es un array compuesto por tantos arrays asociativos como
//    // distribuciones haya en la base de datos
//    $albums = $query->fetchAll(PDO::FETCH_ASSOC);
////    dameDato($albums);
//    return render('../views/home.twig', ['albums' => $albums]);
//});
//
//
////Show Album
//$router->get('/showAlbum', function () use ($pdo) {
//
//    $name = htmlspecialchars($_REQUEST['name']);
//    $id = $_REQUEST['id'];
//    $sql = "select * from tracks where tracks.album = :name";
//    $queryResult = $pdo->prepare($sql);
//    $queryResult->execute([
//        'name' => $name
//    ]);
//    return render('../views/album.twig', [
//        'queryResult' => $queryResult
//    ]);
//});
//
////Add Album
//$router->post('/addAlbum', function () use ($pdo) {
//    $errors = array();
//    $error = false;
//
//    $album = array_fill_keys(["name", "artist", "image", "album_type"],
//        "");
//    if (!empty($_POST)) {
//
//        $album['name'] = htmlspecialchars(trim($_POST['name']));
//        $album['artist'] = htmlspecialchars(trim($_POST['artist']));
//        $album['image'] = htmlspecialchars(trim($_POST['image']));
//        $album['album_type'] = htmlspecialchars(trim($_POST['album_type']));
//
//        if (($album['name']) == "") {
//            $errors['name']['required'] = "album name required";
//        }
//        if (($album['artist']) == "") {
//            $errors['artist']['required'] = "artist required";
//        }
//
//        if (($album['image']) == "") {
//            $errors['image']['required'] = "image required";
//        }
//
//        if (($album['album_type']) == "") {
//            $errors['album_type']['required'] = "album type required";
//        }
//
//        if (empty($errors)) {
//
//            // Si no tengo errores de validación
//            // Guardo en la BD
//
//            $sql = "Insert into albums
//    (name, artist, image, album_type)
//    VALUES
//    (:name, :artist, :image, :album_type )";
//
//            $result = $pdo->prepare($sql);
//            $result->execute([
//
//                'name' => $album['name'],
//                'artist' => $album['artist'],
//                'image' => $album['image'],
//                'album_type' => $album['album_type']
//            ]);
//            header('Location: ' . BASE_URL);
//        } else {
//            $error = true;
//        }
//    }
//    return render('../views/addAlbum.php', [
//        'album' => $album,
//        'errors' => $errors
//    ]);
//});
//
//$router->get('addAlbum', function () use ($pdo) {
//    $errors = array();
//    $error = false;
//
//    $album = array_fill_keys(["name", "artist", "image", "album_type"],
//        "");
//
//    return render('../views/addAlbum.php', [
//        'album' => $album,
//        'errors' => $errors
//    ]);
//});
//
////Add track
//$router->get('/addTrack', function () use ($pdo) {
//    $errors = array();
//    $error = false;
//
//    $track = array_fill_keys(["name", "size", "total_time", "date_added", "play_date", "play_date_utc",
//        "persistent_id", "track_type", "file_folder_count", "album", "genre", "location", "name", "artist", "rating"],
//        "");
//
//    return render('../views/addTrack.php', [
//        'track' => $track,
//        'errors' => $errors
//    ]);
//});
//
//
//$router->post('/addTrack', function () use ($pdo) {
//    $errors = array();
//    $error = false;
//
//    $track = array_fill_keys(["name", "size", "total_time", "date_added", "play_date", "play_date_utc",
//        "persistent_id", "track_type", "file_folder_count", "album", "genre", "location", "name", "artist", "rating"],
//        "");
//    if (!empty($_POST)) {
//
//        $track['name'] = htmlspecialchars(trim($_POST['name']));
//        $track['size'] = htmlspecialchars(trim($_POST['size']));
//        $track['total_time'] = htmlspecialchars(trim($_POST['total_time']));
//        $track['date_added'] = htmlspecialchars(trim($_POST['date_added']));
//        $track['play_date'] = htmlspecialchars(trim($_POST['play_date']));
//        $track['play_date_utc'] = htmlspecialchars(trim($_POST['play_date_utc']));
//        $track['persistent_id'] = htmlspecialchars(trim($_POST['persistent_id']));
//        $track['track_type'] = htmlspecialchars(trim($_POST['track_type']));
//        $track['file_folder_count'] = htmlspecialchars(trim($_POST['file_folder_count']));
//        $track['album'] = htmlspecialchars(trim($_POST['album']));
//        $track['genre'] = htmlspecialchars(trim($_POST['genre']));
//        $track['location'] = htmlspecialchars(trim($_POST['location']));
//        $track['artist'] = htmlspecialchars(trim($_POST['artist']));
//        $track['rating'] = htmlspecialchars(trim($_POST['rating']));
//
//        if (($track['name']) == "") {
//            $errors['name']['required'] = "El campo nombre es requeridoº";
//        }
//
//        if (($track['artist']) == "") {
//            $errors['artist']['required'] = "El campo artista es requerido";
//        }
//
//        if (($track['rating']) == "") {
//            $errors['rating']['required'] = "El campo rating es requerido";
//        }
//
//
//        if (((int)(($track['rating'])) > 5) || (int)(($track['rating'])) < 0) {
//            $errors['rating']['required'] = "Rating debe estar entre 0 y 5";
//        }
//
//        if (($track['size']) == "") {
//            $errors['size']['required'] = "El campo size es requerido";
//        }
//        if (($track['total_time']) == "") {
//            $errors['total_time']['required'] = "El campo total_time es requerido";
//        }
//        if (($track['date_added']) == "") {
//            $errors['date_added']['required'] = "El campo date_added es requerido";
//        }
//        if (($track['play_date']) == "") {
//            $errors['play_date']['required'] = "El campo play_date es requerido";
//        }
//        if (($track['play_date_utc']) == "") {
//            $errors['play_date_utc']['required'] = "El campo play_date_utc es requerido";
//        }
//        if (($track['persistent_id']) == "") {
//            $errors['persistent_id']['required'] = "El campo persistent_id es requerido";
//        }
//        if (($track['track_type']) == "") {
//            $errors['track_type']['required'] = "El campo track_type es requerido";
//        }
//        if (($track['file_folder_count']) == "") {
//            $errors['file_folder_count']['required'] = "El campo file_folder_count es requerido";
//        }
//        if (($track['album']) == "") {
//            $errors['album']['required'] = "El campo album es requerido";
//        }
//        if (($track['genre']) == "") {
//            $errors['genre']['required'] = "El campo genre es requerido";
//        }
//        if (($track['location']) == "") {
//            $errors['location']['required'] = "El campo location es requerido";
//        }
//
//
//        if (empty($errors)) {
//
//            // Si no tengo errores de validación
//            // Guardo en la BD
//
//            $sql = "Insert into tracks
//    (name, artist, size, total_time, date_added, play_date,
//    play_date_utc ,persistent_id ,track_type , file_folder_count,
//    album,genre,location,rating)
//    VALUES
//    (:name, :artist, :size, :total_time, :date_added, :play_date,
//    :play_date_utc, :persistent_id, :track_type,
//    :file_folder_count, :album, :genre, :location ,:rating)";
//
//            $result = $pdo->prepare($sql);
//            $result->execute([
//
//                'name' => $track['name'],
//                'artist' => $track['artist'],
//                'size' => $track['size'],
//                'total_time' => $track['total_time'],
//                'date_added' => $track['date_added'],
//                'play_date' => $track['play_date'],
//                'play_date_utc' => $track['play_date_utc'],
//                'persistent_id' => $track['persistent_id'],
//                'track_type' => $track['track_type'],
//                'file_folder_count' => $track['file_folder_count'],
//                'album' => $track['album'],
//                'genre' => $track['genre'],
//                'location' => $track['location'],
//                'rating' => $track['rating']
//
//            ]);
//            header("Location: " . BASE_URL);
//        } else {
//            $error = true;
//        }
//    }
//
//    return render('../views/addTrack.php', [
//        'track' => $track,
//        'errors' => $errors
//    ]);
//});
//
//
////Show Track
//$router->post('showTrack', function () use ($pdo) {
//    $id = $_REQUEST['id'];
//    $errors = array();
//    $track = getSqlResult($id, $pdo);
//
//    if (($track['name']) == "") {
//        $errors['name']['required'] = "El campo nombre es requeridoº";
//    }
//    if (($track['artist']) == "") {
//        $errors['artist']['required'] = "El campo artista es requerido";
//    }
//    if (($track['rating']) == "") {
//        $errors['rating']['required'] = "El campo rating es requerido";
//    }
//    if (((int)(($track['rating'])) > 5) || (int)(($track['rating'])) < 0) {
//        $errors['rating']['required'] = "Rating debe estar entre 0 y 5";
//    }
//    if (($track['size']) == "") {
//        $errors['size']['required'] = "El campo size es requerido";
//    }
//    if (($track['total_time']) == "") {
//        $errors['total_time']['required'] = "El campo total_time es requerido";
//    }
//    if (($track['date_added']) == "") {
//        $errors['date_added']['required'] = "El campo date_added es requerido";
//    }
//    if (($track['play_date']) == "") {
//        $errors['play_date']['required'] = "El campo play_date es requerido";
//    }
//    if (($track['play_date_utc']) == "") {
//        $errors['play_date_utc']['required'] = "El campo play_date_utc es requerido";
//    }
//    if (($track['persistent_id']) == "") {
//        $errors['persistent_id']['required'] = "El campo persistent_id es requerido";
//    }
//    if (($track['track_type']) == "") {
//        $errors['track_type']['required'] = "El campo track_type es requerido";
//    }
//    if (($track['file_folder_count']) == "") {
//        $errors['file_folder_count']['required'] = "El campo file_folder_count es requerido";
//    }
//    if (($track['album']) == "") {
//        $errors['album']['required'] = "El campo album es requerido";
//    }
//    if (($track['genre']) == "") {
//        $errors['genre']['required'] = "El campo genre es requerido";
//    }
//    if (($track['location']) == "") {
//        $errors['location']['required'] = "El campo location es requerido";
//    }
//
//
////        if (empty($errors)) {
////
////            // Si no tengo errores de validación
////            // Guardo en la BD
////
////            $sql = "Update tracks set name = :name, artist = :artist, size = :size, total_time = :total_time,
////                date_added = :date_added, play_date = :play_date, play_date_utc = :play_date_utc,
////                persistent_id = :persistent_id, track_type = :track_type, file_folder_count = :file_folder_count,
////                album = :album, genre = :genre, location = :location, rating = :rating WHERE id = :id LIMIT 1";
////
////            $result = $pdo->prepare($sql);
////            $result->execute([
////                'id' => $track['id'],
////                'name' => $track['name'],
////                'artist' => $track['artist'],
////                'size' => $track['size'],
////                'total_time' => $track['total_time'],
////                'date_added' => $track['date_added'],
////                'play_date' => $track['play_date'],
////                'play_date_utc' => $track['play_date_utc'],
////                'persistent_id' => $track['persistent_id'],
////                'track_type' => $track['track_type'],
////                'file_folder_count' => $track['file_folder_count'],
////                'album' => $track['album'],
////                'genre' => $track['genre'],
////                'location' => $track['location'],
////                'rating' => $track['rating']
////            ]);
////            header('Location: home.twig');
////        } else {
////            $error = true;
////        }
////    }
//
//    return render('../views/showTrack.php',
//        $track, $errors);
//});
//
//$router->get('showTrack', function () use ($pdo) {
//    $id = $_REQUEST['id'];
//    $errors = array();
//    $error = false;
//    $track = array_fill_keys(["name", "size", "total_time", "date_added", "play_date", "play_date_utc",
//        "persistent_id", "track_type", "file_folder_count", "album", "genre", "location", "name", "artist", "rating"],
//        "");
//    $track = getSqlResult($id, $pdo);
//
//    return render('../views/showTrack.php',
//        $track);
//});
//
////Delete
//$router->get('/delete', function () use ($pdo) {
//    $id = $_REQUEST['id'];
//
//    $sql = "DELETE FROM album WHERE id = :id";
//
//    $result = $pdo->prepare($sql);
//
//    $result->execute(['id' => $id]);
//
//    header("Location: " . BASE_URL);
//
//});