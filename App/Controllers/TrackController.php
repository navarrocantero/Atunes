<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 03/12/2017
 * Time: 23:55
 */

namespace App\Controllers;

use App\models\Album;
use App\models\Track;
use Sirius\Validation\Validator;

class TrackController extends BaseController
{

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
