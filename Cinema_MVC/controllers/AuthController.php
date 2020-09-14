<?php


namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\core\UserModel;
use app\models\Address;
use app\models\LoginForm;
use app\models\User;

/**
 * Class AuthController
 * @package app\controllers
 */

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost())
        {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm-> login())
            {
                $response-> redirect('/');
                return;
            }
        }
        $this->setLayout('home');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        $address = new Address();
        if($request->isPost())
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            $body = ['firstname' => $firstname, 'lastname' => $lastname,
                'email' => $email, 'password' => $password, 'confirmPassword' => $confirmPassword];

            $postal_code = $_POST['postal_code'];
            $street = $_POST['street'];
            $locality = $_POST['locality'];
            $country = $_POST['country'];
            $body_address = ['postal_code' => $postal_code, 'street' => $street,
                'locality' => $locality, 'country' => $country];


            $user->loadData($body);
            $address->loadData($body_address);


            if ($user->validate()  && $address->validate() && $user->save())
            {

                $query =Application::$app->userClass::prepare("SELECT id FROM users WHERE email='$email'");
                $query->execute();
                $id_users = $query->fetch();

                $body_address = ['postal_code' => $postal_code, 'street' => $street,
                    'locality' => $locality, 'country' => $country, 'id_users'=> $id_users['id']];

                $address->loadData($body_address);

                if( $address->save())
                {
                    Application::$app->session->setFlash('success', 'Thanks for registering');
                    Application::$app->response->redirect('/');
                }

            }

            $this->setLayout('home');
            return $this->render('register', ['model' => $user, 'model_add' => $address]);

        }

            $this->setLayout('home');
            return $this->render('register', ['model' => $user, 'model_add' => $address]);

    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }


}