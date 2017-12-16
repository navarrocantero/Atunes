<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 25/11/2017
 * Time: 03:01
 */

namespace App\Controllers;

use App\Models\Album;
use App\Models\Track;
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


        $album = array_fill_keys(["name", "artist", "image", "'album_type"], "");
        $webInfo = [
            'h1' => 'Add Album',
            'submit' => 'Add',
            'method' => 'POST'
        ];
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

            $validator->add('name:Name', 'required', [], $requiredFieldMessageError);
            $validator->add('artist:Artist', 'required', [], $requiredFieldMessageError);

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
        return $this->render('addAlbum.twig', [
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
    public function getIndex($name = null)
    {

        $webInfo = [
            'title' => ' Atuns'
        ];

        if (is_null($name)) {
            $albums = Album::all();
            return $this->render('home.twig', [
                'albums' => $albums,
                'webInfo' => $webInfo
            ]);
        } else {

            // Get all tracks by album name
            $tracks = Track::query()->where('album', $name)->get();

            //Get the album
            $album = Album::query()->where('name', $name)->get();

            $webInfo = [
                'title' => $tracks->get(0)['album'],
                'artist' => $album->get(0)['artist'],
                'image' => $album->get(0)['image']

            ];
            return $this->render('album.twig', [
                'album' => $name,
                'tracks' => $tracks,
                'webInfo' => $webInfo
            ]);
        }
    }

    /**
     * Path PUT /album/edit to update some fields about one album
     * @return string Render with all web's info.
     */
    public function putEdit($name)
    {

        $errors = array();  // Array donde se guardaran los errores de validación
        $webInfo = [
            'h1' => 'Update Album',
            'submit' => 'Update',
            'method' => 'PUT'
        ];

        if (!empty($_POST)) {
            $album = (Album::where('name', $name)->get()[0]);


            // Validate NOT NULL fields
            $validator = new Validator();
            $requiredFieldMessageError = "The field {label} is required";
            $validator->add('name:Name', 'required', [], $requiredFieldMessageError);
            $validator->add('artist:Artist', 'required', [], $requiredFieldMessageError);

            // Extrct POST DATA
            $album['name'] = htmlspecialchars(trim($_POST['name']));
            $album['image'] = htmlspecialchars(trim($_POST['image']));
            $album['artist'] = htmlspecialchars(trim($_POST['artist']));
            $album['album_type'] = htmlspecialchars(trim($_POST['album_type']));


            if ($validator->validate($album)) {
                $album = Album::where('id', $album['id'])->update([
                    'id' => $album['id'],
                    'name' => $album['name'],
                    'image' => $album['image'],
                    'artist' => $album['artist'],
                    'album_type' => $album['album_type']
                ]);
                // Si se guarda sin problemas se redirecciona la aplicación a la página de inicio
                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }
        }
        return $this->render('addAlbum.twig', [
            'album' => $album,
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }

    /**
     * Path GET /album/edit to show all info about one album
     * @return string Render with all web's info.
     */
    public function getEdit($name)
    {
        $errors = array();  // Array donde se guardaran los errores de validación
        $webInfo = [
            'h1' => 'Update album',
            'submit' => 'Update',
            'method' => 'PUT'
        ];
        // Recuperar datos
        $album = Album::query()->where('name', $name)->get();
        if (!$album) {
            header('Location: home.twig');
        }

        return $this->render('addAlbum.twig', [
            'album' => $album->get(0),
            'errors' => $errors,
            'webInfo' => $webInfo
        ]);
    }

    /**
     * Path DELETE /album to erase the album with the $ID
     */
    public function deleteIndex()
    {
        $id = $_REQUEST['id'];

        $album = Album::destroy($id);

        header("Location: " . BASE_URL);
    }
}
