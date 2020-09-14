<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class UpdateForm extends Model
{
    public string $firstname = '';
    public string $lastname = '';
    public string $postal_code = '';
    public string $street = '';
    public string $locality = '';
    public string $country = '';

    public function tableName(): string
    {
        return 'userview';
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'postal_code' =>[self::RULE_REQUIRED],
            'street' =>[self::RULE_REQUIRED],
            'locality' =>[self::RULE_REQUIRED],
            'country' =>[self::RULE_REQUIRED]

        ];
    }


    public function primaryKey(): string
    {
        return 'id';
    }
}