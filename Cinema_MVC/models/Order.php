<?php


namespace app\models;

use app\core\db\DbModel;
use app\core\UserModel;

/**
 * Class User
 * @package app\models
 */
class Order extends DbModel
{

    public string $moviename = '';
    public string $datetime ;
    public string $id_user ;



    public function tableName(): string
    {
        return 'ordertable';
    }


    public function attributes(): array
    {
        return  ['moviename', 'datetime', 'id_user'];
    }

    public function labels(): array
    {
        return [
            'moviename' => 'Movie name',
            'datetime' => 'Date time',
            'id_user' => 'ID user',
        ];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return[
        'moviename' => [self::RULE_REQUIRED],
        'datetime' => [self::RULE_REQUIRED],
        'id_user' => [self::RULE_REQUIRED]];

    }



}
