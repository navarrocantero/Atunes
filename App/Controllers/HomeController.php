<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 25/11/2017
 * Time: 02:16
 */

namespace App\Controllers;

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
        $webIinfo = [
            'title' => "Login"
        ];

        return $this->render('auth/login.twig', ["webInfo" => $webIinfo]);
    }

    public function postLogin()
    {

        $errors = [];
        $validator = new Validator();

        $validator->add('inputEmail:Email', 'email', [], 'Type a correct email format');
        $validator->add('inputEmail:Email', 'required', [], 'The field {label} is required');
        $validator->add('inputPassword:Password', 'required', [], 'The field {label} is required');


        if ($validator->validate($_POST)) {
            $user = User::query()->where('email', $_POST['inputEmail'])->first();
//            $user =  User::where('email', $_POST['inputEmail']->first());
            if (password_verify($_POST['inputPassword'], $user->password)) {
                $_SESSION['userId'] = $user->id;
                $_SESSION['userName'] = $user->name;
                $_SESSION['userEmail'] = $user->email;


                header('Location: ' . BASE_URL);
            }
            $validator->addMessage('authError', 'Incorrect data');
        }
        $errors = $validator->getMessages();
        return $this->render('Auth/login.twig', ['errors' => $errors]);
    }

    public function getRegister()
    {
        $webInfo = [
            'title' => "Register"
        ];
        return $this->render('auth/register.twig', ['webInfo' => $webInfo]);
    }

    public function PostRegister()
    {
        $webInfo = [
            'title' => "Register"
        ];

        $validator = new Validator();

        $errors = [];
        if (!empty($_POST)) {
            $user['name'] = htmlspecialchars(trim($_POST['inputName']));
            $user['email'] = htmlspecialchars(trim($_POST['inputEmail']));

            $validator->add('inputName:Nombre', 'required', [], 'The field {label} is required');
            $validator->add('inputName:Nombre', 'minlength', ['min' => 5], 'The field {label} must have 5 charachters at least');
            $validator->add('inputEmail:Email', 'required', [], 'The field {label} is required');
            $validator->add('inputEmail:Email', 'email', [], 'Type a correct email format');
            $validator->add('inputPassword1:Password', 'required', [], 'The field {label} is required');
            $validator->add('inputPassword1:Password', 'minlength', ['min' => 8], 'The field {label} must have 8 charachters at least');
            $validator->add('inputPassword2:Password', 'required', [], 'The field {label} is required');
            $validator->add('inputPassword2:Password', 'match', 'inputPassword1', 'The passwords dont match');

            if ($validator->validate($_POST)) {
                $user = new User();

                $user->name = $_POST['inputName'];
                $user->email = $_POST['inputEmail'];
                $user->password = password_hash($_POST['inputPassword1'], PASSWORD_DEFAULT);

                $user->save();

                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }

            return $this->render('auth/register.twig', [
                'user' => $user,
                'errors' => $errors,
                'webInfo' => $webInfo
            ]);
        }
    }
}