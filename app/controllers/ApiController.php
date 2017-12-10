<?php

namespace App\Controllers;

use App\Models\Album;
use App\Models\Track;

class ApiController
{


    /**
     * Path GET /api/albums shows all albums
     * @return json with all albums.
     */
    public function getAlbums()
    {

            $Albums = Album::all();
            header('Content-Type: application/json');
            return json_encode($Albums);

    }

    /**
     * Path GET /api/album/ALBUM_NAME shows unique album ( all tracks inside album)
     * @return json with all albums.
     */
    public function getAlbum($name)
    {

        $tracks = Track::query()->where('album', $name)->get();
        header('Content-Type: application/json');
        return json_encode($tracks);
    }
}