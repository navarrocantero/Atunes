<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 03/12/2017
 * Time: 23:55
 */

namespace App\Controllers;

use App\Models\Album;
use App\Models\Track;
use Sirius\Validation\Validator;

class TrackController extends BaseController
{

//    public function putTrack($name)
//    {
//        dameDato($_POST);
//        $errors = array();  // Array donde se guardaran los errores de validación
//        $webInfo = [
//            'h1' => 'Update Track',
//            'submit' => 'Update',
//            'method' => 'PUT'
//        ];
//
//        if (!empty($_POST)) {
////            dameDato($_POST);
//            // Validate NOT NULL fields
//            $validator = new Validator();
//            $requiredFieldMessageError = "The field {label} is required";
//            $validator->add('name:Name', 'required', [], $requiredFieldMessageError);
//            $validator->add('artist:Artist', 'required', [], $requiredFieldMessageError);
//            $validator->add('genre:Genre', 'required', [], $requiredFieldMessageError);
//            $validator->add('album:Album', 'required', [], $requiredFieldMessageError);
//
//            // Extrct POST DATA
//            $album['name'] = htmlspecialchars(trim($_POST['name']));
//            $album['artist'] = htmlspecialchars(trim($_POST['artist']));
//            $album['genre'] = htmlspecialchars(trim($_POST['genre']));
//            $album['album'] = htmlspecialchars(trim($_POST['album']));
//            ;
//
//            if ($validator->validate($album)) {
//                Track::where('name', $album['name'])->update([
//                    'name' => $album['name'],
//                    'artist' => $album['artist'],
//                    'genre' => $album['genre'],
//                    'album' => $album['album'],
//                ]);
//
//                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
//                header('Location: ' . BASE_URL);
//            } else {
//                $errors = $validator->getMessages();
//            }
//        }
//        return $this->render('track.twig', [
//            'album' => $album,
//            'errors' => $errors,
//            'webInfo' => $webInfo
//        ]);
//    }

    /**
     * Path GET /album/{{album.name}}/track/{{track.id}} to show
     * all info about one album's track
     * @return string Render with all web's info.
     */
    public function getTrack()
    {
        $route = convierteArray($_GET['route']);
        $trackId = end($route);

//        dameDato($trackId);
        $errors = array();  // Array donde se guardaran los errores de validación
        $webInfo = [
            'h1' => 'Update Track',
            'submit' => 'Update',
            'method' => 'PUT'
        ];
        // Recuperar datos
        $album = Track::query()->where('id', $trackId)->get();
        if (!$album) {
            header('Location: home.twig');
        }

        return $this->render('track.twig', [
            'track' => $album->get(0),
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }

    /**
     * Path GET /album/{{album.name}}/track/{{track.id}} to
     * update some fields about album's track
     * @return string Render with all web's info.
     */
    public function putTrack()
    {

        $errors = array();  // Array donde se guardaran los errores de validación
        $webInfo = [
            'h1' => 'Update Track',
            'submit' => 'Update',
            'method' => 'PUT'
        ];
        $route = convierteArray($_GET['route']);
        $trackId = end($route);

        if (!empty($_POST)) {
            $track = Track::query()->where('id', $trackId)->get();

            // Validate NOT NULL fields
            $validator = new Validator();
            $requiredFieldMessageError = "The field {label} is required";
            $validator->add('name:Name', 'required', [], $requiredFieldMessageError);
            $validator->add('artist:Artist', 'required', [], $requiredFieldMessageError);
            $validator->add('album:Album', 'required', [], $requiredFieldMessageError);
            $validator->add('genre:Genre', 'required', [], $requiredFieldMessageError);

            // Extrct POST DATA
            $track['name'] = htmlspecialchars(trim($_POST['name']));
            $track['album'] = htmlspecialchars(trim($_POST['album']));
            $track['artist'] = htmlspecialchars(trim($_POST['artist']));
            $track['genre'] = htmlspecialchars(trim($_POST['genre']));
            $track['track_number'] = htmlspecialchars(trim($_POST['track_number']));
            $track['rating'] = htmlspecialchars(trim($_POST['rating']));
            $track['location'] = htmlspecialchars(trim($_POST['location']));
            $track['bpm'] = htmlspecialchars(trim($_POST['bpm']));
            $track['size'] = htmlspecialchars(trim($_POST['size']));


            if ($validator->validate($track)) {
                $track = Track::where('id', $trackId)->update([
                    'id' => $trackId,
                    'album' => $track['album'],
                    'genre' => $track['genre'],
                    'name' => $track['name'],
                    'artist' => $track['artist'],
                    'size' => $track['size'],
                    'location' => $track['location'],
                    'rating' => $track['rating'],
                    'track_number' => $track['track_number'],
                    'bpm' => $track['bpm']
                ]);
                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }
        }
        return $this->render('track.twig', [
            'track' => $track,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }

}