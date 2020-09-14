<?php
namespace app\core;

use app\core\db\Database;
use app\models\Address;
use app\models\Userview;

/**
 * Class Application
 *
 * @author Sara Nowak <nowak.es10@gmail.com>
 * @package app\core
 */
class Application
{
    public string $layout = 'main';
    public string $userClass;
    public string $adminClass;
    public string $addressClass;
    public string $userviewClass;
    public string $orderClass;
    public string $movieClass;
    public string $dateClass;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public ?UserModel $user;
    public ?AdminModel $admin;
    public ?Address $address;
    public ?Userview $userview;
    public View $view;

    public static Application $app;
    public ?Controller $controller = null;


    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        $this->adminClass = $config['adminClass'];
        $this->addressClass = $config['addressClass'];
        $this->userviewClass = $config['userviewClass'];
        $this->movieClass = $config['movieClass'];
        $this->orderClass = $config['orderClass'];
        $this->dateClass = $config['dateClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->view = new View();
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');

        if ($primaryValue)
        {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }else{
            $this->user = null;
        }
        ///admin
        $adminPrimaryValue = $this->session->get('admin');

        if ($adminPrimaryValue)
        {
            $adminPrimaryKey = $this->adminClass::primaryKey();
            $this->admin = $this->adminClass::findOne([$adminPrimaryKey => $adminPrimaryValue]);

        }else{
            $this->admin = null;
        }
    }

    public function run(){
        try
        {
            echo $this->router->resolve();
        }catch(\Exception $e){

            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error',[
                'exception' =>  $e
            ]);
        }

    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public static function isAdmin()
    {
        return self::$app->admin;
    }

    public static function isntAdmin()
    {
        return !self::$app->admin;
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }
    /**
     * @param Controller $controller
     */

    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function login(UserModel $user)
    {
        $this->user= $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user-> {$primaryKey};
        $this->session->set('user',$primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user =null;
        $this->session->remove('user');
    }

    public function adminLogin(AdminModel $admin)
    {
        $this->admin= $admin;
        $adminPrimaryKey = $admin->primaryKey();
        $adminPrimaryValue = $admin-> {$adminPrimaryKey};
        $this->session->set('admin',$adminPrimaryValue);
        return true;
    }

    public function adminLogout()
    {
        $this->admin =null;
        $this->session->remove('admin');
    }

    public function deleteUser()
    {
        if (isset($_GET['email']))
        {
            $email = $_GET['email'];
            $query =$this->userClass::prepare("DELETE FROM users WHERE email='$email'");
            $query->execute();
        }
    }

    public function updateUser()
    {
        $email=$_GET['email'];

        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $postal_code=$_POST['postal_code'];
        $street=$_POST['street'];
        $locality=$_POST['locality'];
        $country=$_POST['country'];
        $query=Application::$app->userClass::prepare("UPDATE users set firstname='$firstname' ,lastname='$lastname' where email='$email'");
        $query->execute();
        $query_add=Application::$app->userviewClass::prepare("UPDATE userview set postal_code='$postal_code',street='$street',locality='$locality',country='$country' where email='$email'");
        $query_add->execute();

    }

}