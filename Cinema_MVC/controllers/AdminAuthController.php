<?php


namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;

use app\models\AdminLoginForm;


/**
 * Class AdminAuthController
 * @package app\controllers
 */

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $adminLoginForm = new AdminLoginForm();
        if ($request->isPost())
        {
            $adminLoginForm->loadData($request->getBody());
            if ($adminLoginForm->validate() && $adminLoginForm-> login())
            {
                $response-> redirect('/adminPanel');
                return;
            }
        }
        $this->setLayout('adminLogin');
        return $this->render('login', [
            'model' => $adminLoginForm
        ]);
    }


    public function logout(Request $request, Response $response)
    {
        Application::$app->adminLogout();
        $response->redirect('/admin');
    }





}