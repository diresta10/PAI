<?php


namespace app\models;

use app\core\db\DbModel;
use app\core\UserModel;

/**
 * Class User
 * @package app\models
 */
class Date extends DbModel
{

    public string $date = '';



    public function tableName(): string
    {
        return 'date';
    }


    public function attributes(): array
    {
        return  ['date'];
    }

    public function labels(): array
    {
        return [
            'date' => 'Date',
        ];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
    }



}
