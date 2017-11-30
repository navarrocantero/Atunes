<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 25/11/2017
 * Time: 03:01
 */

namespace App\Controllers;

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

    public function getAdd()
    {
        return $this->render('addAlbum.twig', []);
    }

    public function getAlbum()
    {
        // Recuperar datos
        $query = $this->pdo->query("SELECT * from  albums");
        $query->execute();
        $tracks = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $this->render('album.twig', ['tracks' => $tracks]);
    }

    public function deleteAlbum()
    {
        return null;
    }

    // Ruta raiz
    public function getIndex($name = null)
    {
        if (is_null($name)) {
            $query = $this->pdo->query("SELECT * from  albums");
            $query->execute();
            $albums = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $this->render('home.twig', ['albums' => $albums]);
        } else {
            // Recuperar datos

            $sql = "SELECT * from  tracks where album = :name";
            $query = $this->pdo->prepare($sql);
            $query->execute(['name' => $name]);
            $tracks = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $this->render('album.twig', ['tracks' => $tracks]);
        }
    }
}
