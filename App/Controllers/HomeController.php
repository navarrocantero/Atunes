<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 25/11/2017
 * Time: 02:16
 */

namespace App\Controllers;

/** Clase que gestiona la ruta raiz " / "
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends  BaseController
{

    public function getIndex()
    {
        return ((new AlbumController())->getIndex());
    }

}