<?php


namespace app\models;

namespace app\models;

use app\core\AdminModel;
use app\core\UserModel;

/**
 * Class User
 * @package app\models
 */
class Admin extends AdminModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 2;

    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password ='';

    public function tableName(): string
    {
        return 'admin';
    }

    public function rules(): array
    {
        return[
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL,
                [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8],[self::RULE_MAX,'max'=>24]]
        ];
    }

    public function attributes(): array
    {
        return  ['email', 'password', 'status'];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getDisplayName(): string
    {
        return $this->email;
    }

    public function getDisplayId(): int
    {
        $adminPrimaryKey = $this->primaryKey();
        return $this-> {$adminPrimaryKey};

    }



}
