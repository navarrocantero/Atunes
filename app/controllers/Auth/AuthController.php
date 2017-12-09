<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 25/11/2017
 * Time: 03:01
 */

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use Sirius\Validation\Validator;

class AuthController extends BaseController
{
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

//            $user = User::query()->where('email', $_POST['inputEmail'])->first();
            $user = User::where('email', $_POST['inputEmail'])->first();

            if (password_verify($_POST['inputPassword'], $user->password)) {
                $_SESSION['userId'] = $user->id;
                $_SESSION['userName'] = $user->name;
                $_SESSION['userEmail'] = $user->email;

//                header('Location: ' . BASE_URL);
//                return $this->render('/', ['errors' => $errors, 'user' => $user]);
                header('Location: '. BASE_URL);
            }

            $validator->addMessage('authError', 'User   or Pass are incorrect');
        }
        $errors = $validator->getMessages();
        return $this->render('Auth/login.twig', ['errors' => $errors]);
    }

    public function getLogout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['userEmail']);
        unset($_SESSION['userName']);
        header("Location: " . BASE_URL);
    }
}
