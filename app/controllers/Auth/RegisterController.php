<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 06/12/2017
 * Time: 01:52
 */

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use Sirius\Validation\Validator;

class RegisterController extends BaseController
{
    /**
     * Path GET /register shows a form to add new user
     * @return string Render with all web's info.
     */
    public function getRegister()
    {
        $webInfo = [
            'title' => "Register"
        ];

        return $this->render('auth/profile.twig', ['webInfo' => $webInfo]);
    }
    /**
     * Path POST /register process the action of add a new user
     * @return string Render with all web's info.
     */
    public function postRegister()
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
                $users = User::query()->where('email', $user['email'])->get();
//
                $user = new User();
                $user->name = $_POST['inputName'];
                $user->email = $_POST['inputEmail'];
                $user->password = password_hash($_POST['inputPassword1'], PASSWORD_DEFAULT);
                $user->save();
                header('Location: ' . BASE_URL);
            } else {
                $errors = $validator->getMessages();
            }
            return $this->render('auth/profile.twig', [
                'user' => $user,
                'errors' => $errors,
                'webInfo' => $webInfo
            ]);
        }
    }
}