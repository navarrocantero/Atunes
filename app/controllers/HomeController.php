<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 25/11/2017
 * Time: 02:16
 */

namespace App\Controllers;


use App\Controllers\Auth\RegisterController;
use App\Controllers\Auth\AuthController;
use App\Controllers\AlbumController;
use Sirius\Validation\Validator;
use App\Models\User;

/** Clase que gestiona la ruta raiz " / "
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends BaseController
{

    public function getIndex()
    {
        return ((new AlbumController())->getIndex());
    }

    public function getLogin()
    {

        return ((new AuthController()))->getLogin();
    }

    public function postLogin()
    {
        return ((new AuthController()))->postLogin();
    }

    public function getRegister()
    {

        return ((new RegisterController()))->getRegister();
    }

    public function PostRegister()
    {
        return ((new RegisterController()))->postRegister();
    }

    public function getDemo(){
        return "OK";
    }

    public function  getLogout(){
        return ((new AuthController()))->getLogout();
    }

    public function  getProfile(){
        return ((new AuthController()))->getProfile();
    }

    public function  postProfile(){
        return ((new AuthController()))->postProfile();
    }
}