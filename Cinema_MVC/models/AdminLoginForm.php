<?php


namespace app\models;

use app\core\Application;
use app\core\Model;

class AdminLoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Admin email',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $admin = Admin::findOne(['email' => $this-> email]);
        $admin_password = Admin::findOne(['password' => md5($this ->password)]);


        if (!$admin)
        {
            $this ->addError('email', 'User does not exist with this email');
            return false;
        }
        if (!$admin_password)
        {
            $this ->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->adminLogin($admin);
    }
}