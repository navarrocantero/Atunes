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

class AlbumController extends BaseController
{

    public function postAdd()
    {
//        Si esta vacio el post hago el insert y el header al index, sino, sera la fucion de editar album
        if (!empty($_POST)) {
            dameDato($_POST);
        }
        return "añadir";
    }
//
    public function getAdd()
    {
        return $this->render('addAlbum.twig', []);
    }


    // Ruta raiz
    public function getIndex($name = null)
    {

        if (is_null($name)) {
            $albums = Album::all();
            return $this->render('home.twig', ['albums' => $albums]);
        } else {
            // Recuperar datos
            $album = Track::query()->where('album',$name )->get();
            return $this->render('album.twig', ['album' => $album]);
        }
    }
}
