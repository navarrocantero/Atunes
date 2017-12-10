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

    /** Perform the Index of Album Controller
     * @return string Render with all web's info.
     */
    public function getIndex()
    {
        return ((new AlbumController())->getIndex());
    }

    /** Perform the GET Login in Auth Controller
     * @return string Render with all web's info.
     */
    public function getLogin()
    {

        return ((new AuthController()))->getLogin();
    }

    /** Perform the  Post Login in Auth Controller
     * @return string Render with all web's info.
     */
    public function postLogin()
    {
        return ((new AuthController()))->postLogin();
    }

    /** Perform the  GET register in Register Controller
     * @return string Render with all web's info.
     */
    public function getRegister()
    {

        return ((new RegisterController()))->getRegister();
    }

    /** Perform the  POST register in Register Controller
     * @return string Render with all web's info.
     */
    public function PostRegister()
    {
        return ((new RegisterController()))->postRegister();
    }

    /** Perform the  GET logout in Auth Controller
     * @return string Render with all web's info.
     */
    public function  getLogout(){
        return ((new AuthController()))->getLogout();
    }

    /** Perform the  GET profile in Auth Controller
     * @return string Render with all web's info.
     */
    public function  getProfile(){
        return ((new AuthController()))->getProfile();
    }

    /** Perform the  Post profile in Register Controller
     * @return string Render with all web's info.
     */
    public function  postProfile(){
        return ((new AuthController()))->postProfile();
    }
}