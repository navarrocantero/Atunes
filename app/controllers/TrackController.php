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

    public function putTrack($name)
    {
        $errors = array();  // Array donde se guardaran los errores de validación
        $webInfo = [
            'h1' => 'Update Track',
            'submit' => 'Update',
            'method' => 'PUT'
        ];

        if (!empty($_POST)) {
//            dameDato($_POST);
            // Validate NOT NULL fields
            $validator = new Validator();
            $requiredFieldMessageError = "The field {label} is required";
            $validator->add('name:Name', 'required', [], $requiredFieldMessageError);
            $validator->add('artist:Artist', 'required', [], $requiredFieldMessageError);
            $validator->add('genre:Genre', 'required', [], $requiredFieldMessageError);
            $validator->add('album:Album', 'required', [], $requiredFieldMessageError);

            // Extrct POST DATA
            $album['name'] = htmlspecialchars(trim($_POST['name']));
            $album['artist'] = htmlspecialchars(trim($_POST['artist']));
            $album['genre'] = htmlspecialchars(trim($_POST['genre']));
            $album['album'] = htmlspecialchars(trim($_POST['album']));
            ;

            if ($validator->validate($album)) {
                Track::where('name', $album['name'])->update([
                    'name' => $album['name'],
                    'artist' => $album['artist'],
                    'genre' => $album['genre'],
                    'album' => $album['album'],
                ]);

                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }
        }
        return $this->render('track.twig', [
            'album' => $album,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }

    /**
     * Path GET / Go to the app's home
     *
     * @param null $name Album's name
     * @return string Render with all info about the web
     */
    public function getTrack($name = null)
    {

        $webInfo = [
            'title' => 'Home - Atuns'
        ];

        if (is_null($name)) {
            $albums = Album::all();
            return $this->render('home.twig', [
                'albums' => $albums,
                'webInfo' => $webInfo
            ]);
        } else {

            // Recuperar datos
            $album = Track::query()->where('album', $name)->get();
            $webInfo = [
                'title' => 'Track Details',
                'submit' => 'Update',
                'method' => 'PUT',
            ];

            return $this->render('track.twig', [
                'album' => $album->get(0),
                'webInfo' => $webInfo
            ]);
        }
    }

}
