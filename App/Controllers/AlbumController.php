<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 25/11/2017
 * Time: 03:01
 */

namespace App\Controllers;

use App\models\Album;
use App\models\Track;
use Sirius\Validation\Validator;

class AlbumController extends BaseController
{

    /**
     * Path GET /album/add shows a form to add new album
     * @return string Render with all web's info.
     */
    public function getAdd()
    {
        $errors = array();  // Array donde se guardaran los errores de validación
        $error = false;     // Será true si hay errores de validación.

        $webInfo = [
            'h1' => 'Add Album',
            'submit' => 'Add',
            'method' => 'POST'
        ];

        $album = array_fill_keys(["name", "artist", "image", "'album_type"], "");
        return $this->render('addAlbum.twig', [
            'album' => $album,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }

    /**
     * Path POST /album/add process the action of add a new album
     * @return string Render with all web's info.
     */
    public function postAdd()
    {

        $webInfo = [
            'h1' => 'Add Album',
            'submit' => 'Add',
            'method' => 'POST'
        ];
//        Si esta vacio el post hago el insert y el header al index, sino, sera la fucion de editar album
        if (!empty($_POST)) {

            // Validate NOT NULL fields
            $validator = new Validator();

            $requiredFieldMessageError = "The field {label} is required";

            $validator->add('name', 'required',[], $requiredFieldMessageError);
            $validator->add('artist', 'required', [],$requiredFieldMessageError);

            // Extrct POST DATA

            $album['name'] = htmlspecialchars(trim($_POST['name']));
            $album['image'] = htmlspecialchars(trim($_POST['image']));
            $album['artist'] = htmlspecialchars(trim($_POST['artist']));
            $album['album_type'] = htmlspecialchars(trim($_POST['album_type']));

            if ($validator->validate($_POST)) {
                $album = new Album([
                    'name' => $album['name'],
                    'image' => $album['image'],
                    'artist' => $album['artist'],
                    'album_type' => $album['album_type'],
                ]);
                $album->save();
                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }

        }
        return $this->render('addAlbum.twig',[
            'album' => $album,
            'errors'=> $errors,
            'webInfo'=>$webInfo
        ]);
    }


    /**
     * Path GET / Go to the app's home
     *
     * @param null $name Album's name
     * @return string Render with all info about the web
     */
    public function getIndex($name = null)
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
            $webInfo = [
                'title' => 'Página de Distro - DistroADA'
            ];
            // Recuperar datos
            $album = Track::query()->where('album', $name)->get();
            return $this->render('album.twig', [
                'album' => $album,
                'webInfo' => $webInfo
            ]);
        }
    }
}
