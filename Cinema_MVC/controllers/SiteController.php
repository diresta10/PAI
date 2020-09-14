<?php

namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;
use app\models\Movie;
use app\models\Order;
use app\models\User;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $this->setLayout('home');
        return $this->render('home');
    }
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request-> isPost())
        {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact-> send())
            {
                Application::$app->session->setFlash('success', 'Thanks for contacting us');
                return $response->redirect('/contact');
            }
        }
        $this->setLayout('home');
        return $this->render('contact', [
            'model' => $contact
        ]);
    }

    public function ticket(Request $request)
    {

        $order = new Order();
        if($request->isPost())
        {
            $id_movie=$_GET['id_movie'];

            $statement=Application::$app->movieClass::prepare("Select name FROM movie where id_movie=$id_movie;");
            $statement->execute();
            $row=$statement->fetch();

            $moviename = $row['name'];
            $date_time = $_POST['datetime'];


            $id_user=Application::$app->user->getDisplayId();

            $body = ['moviename' => $moviename,'datetime' => $date_time, 'id_user' => $id_user];
            $order->loadData($body);


            if( $order->save())
            {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
            $this->setLayout('home');
            return $this->render('ticket');


        }

        $this->setLayout('home');
        return $this->render('ticket');
    }


}