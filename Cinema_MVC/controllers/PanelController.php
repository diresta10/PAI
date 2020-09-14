<?php


namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\Request;
use app\core\Response;
use app\models\UpdateForm;
use app\models\User;
use app\models\Userview;

class PanelController extends Controller
{
    public function adminPanel()
    {
        $this->setLayout('dashboard');
        return $this->render('adminPanel');
    }

    public function deleteUser(Request $request, Response $response)
    {
        Application::$app->deleteUser();
        $response->redirect('/adminPanel');

    }

    public function updateUser(Request $request, Response $response)
    {

        $updateForm = new UpdateForm();
        if ($request->isPost())
        {
            $updateForm->loadData($request->getBody());

            if($updateForm->validate())
            {
                Application::$app->updateUser();
                Application::$app->session->setFlash('success', 'Profile update successfully');
                $response->redirect('/adminPanel');


            }
            $this->setLayout('update');
            return $this->render('updateUser');

        }

        $this->setLayout('update');
        return $this->render('updateUser');

    }



}