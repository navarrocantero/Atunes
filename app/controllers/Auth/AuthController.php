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
    /**
     * Path GET /register shows a form to log in in web
     * @return string Render with all web's info.
     */
    public function getLogin()
    {

        $webIinfo = [
            'title' => "Login"
        ];

        return $this->render('auth/login.twig', ["webInfo" => $webIinfo]);
    }

    /**
     * Path POST /album/add process the action of add a new album
     * @return string Render with all web's info.
     */
    public function postLogin()
    {
        $errors = [];
        $validator = new Validator();

        $validator->add('inputEmail:Email', 'email', [], 'Type a correct email format');
        $validator->add('inputEmail:Email', 'required', [], 'The field {label} is required');
        $validator->add('inputPassword:Password', 'required', [], 'The field {label} is required');


        if ($validator->validate($_POST)) {

            $user = User::where('email', $_POST['inputEmail'])->first();
            if (password_verify($_POST['inputPassword'], $user->password)) {
                if ( $user->id) {
                    $_SESSION['userId'] = $user->id;
                    $_SESSION['userName'] = $user->name;
                    $_SESSION['userEmail'] = $user->email;


                    header('Location: ' . BASE_URL);
                }
            }

            $validator->addMessage('authError', 'User   or Pass are incorrect');
        }
        $errors = $validator->getMessages();
        return $this->render('auth/login.twig', ['errors' => $errors]);
    }

    /**
     * Path GET /logout perform the accion of logout the current user
     * @return string Render with all web's info.
     */
    public function getLogout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['userEmail']);
        unset($_SESSION['userName']);
        header("Location: " . BASE_URL);
    }

    /**
     * Path GET /register shows a form to update the current user
     * @return string Render with all web's info.
     */
    public function getProfile()
    {
        $user = [
            'userName' => $_SESSION['userName'],
            'userEmail' => $_SESSION['userEmail']
        ];
        $webIinfo = [
            'title' => "Profile",
            'method' => "POST",
            'button' => "Update",
            'url' => "profile"
        ];

        return $this->render('auth/profile.twig', [
            "webInfo" => $webIinfo,
            "user" => $user,
        ]);
    }

    /**
     * Path POST /profile process the action update the  current user
     * @return string Render with all web's info.
     */
    public function postProfile()
    {
        $webIinfo = [
            'title' => "Profile",
            'method' => "POST",
            'button' => "Update",
            'url' => "profile"
        ];


        $validator = new Validator();
        $errors = [];

        // Extrct POST DATA
        $user['userEmail'] = htmlspecialchars(trim($_POST['inputEmail']));
        $user['userName'] = htmlspecialchars(trim($_POST['inputName']));

        // Extract OLD USER DATA FROM DATABASE
        $oldUserData = User::where('email', $_SESSION['userEmail'])->first();
        // Some validations ( like the RegisterController but no the same  )
        $validator->add('inputName:Nombre', 'required', [], 'The field {label} is required');
        $validator->add('inputName:Nombre', 'minlength', ['min' => 5], 'The field {label} must have 5 charachters at least');
        $validator->add('inputEmail:Email', 'required', [], 'The field {label} is required');
        $validator->add('inputEmail:Email', 'email', [], 'Type a correct email format');
        $validator->add('inputPassword1:Password', 'required', [], 'The field {label} is required');
        $validator->add('inputPassword1:Password', 'minlength', ['min' => 8], 'The field {label} must have 8 charachters at least');
        $validator->add('inputPassword2:Password', 'required', [], 'The field {label} is required');
        $validator->add('inputPassword1:Password', 'match', 'inputPassword2', 'The passwords dont match');

        if ($validator->validate($_POST)) {
            $oldUserData->update([
                'id' => $oldUserData->id,
                'name' => $user['userName'],
                'email' => $user['userEmail'],
                'password' => password_hash($_POST['inputPassword1'], PASSWORD_DEFAULT)
            ]);
            header('Location: ' . BASE_URL);

        } else {
            $errors = $validator->getMessages();
        }
        return $this->render('auth/profile.twig', [
            "webInfo" => $webIinfo,
            'errors' => $errors,
            "user" => $user
        ]);
    }
}
