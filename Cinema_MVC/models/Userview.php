<?php
namespace app\models;

use app\core\AddressModel;
use app\core\db\DbModel;

/**
 * Class Address
 * @package app\models
 */
class Userview extends DbModel
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $created_at ='';
    public string $postal_code = '';
    public string $street = '';
    public string $locality = '';
    public string $country ='';


    public function tableName(): string
    {
        return 'address';
    }

    public function save()
    {
        return parent::save();
    }


    public function rules(): array
    {
        return[
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL,
                [self::RULE_UNIQUE, 'class' => self::class]],
            'postal_code' => [self::RULE_REQUIRED],
            'street' => [self::RULE_REQUIRED],
            'locality' => [self::RULE_REQUIRED],
            'country' => [self::RULE_REQUIRED],

        ];
    }

    public function attributes(): array
    {
        return  ['firstname', 'lastname', 'email', 'created_at','postal_code', 'street', 'locality', 'country'];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'created_at'=> 'Registration Date',
            'postal_code' => 'Postal code',
            'street' => 'Address',
            'locality' => 'Locality',
            'country' => 'Country',

        ];
    }

    public function primaryKey(): string
    {
        return 'id_address';
    }



}
