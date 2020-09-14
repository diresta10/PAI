<?php


namespace app\models;

use app\core\db\DbModel;

/**
 * Class Address
 * @package app\models
 */
class Address extends DbModel
{
    public string $postal_code = '';
    public string $street = '';
    public string $locality = '';
    public string $country ='';
    public int $id_users;

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
            'postal_code' => [self::RULE_REQUIRED],
            'street' => [self::RULE_REQUIRED],
            'locality' => [self::RULE_REQUIRED],
            'country' => [self::RULE_REQUIRED],

        ];
    }

    public function attributes(): array
    {
        return  ['postal_code', 'street', 'locality', 'country', 'id_users'];
    }

    public function labels(): array
    {
        return [
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
