<?php


namespace app\models;

use app\core\db\DbModel;
use app\core\UserModel;

/**
 * Class User
 * @package app\models
 */
class Movie extends DbModel
{

    public string $name = '';
    public string $genre = '';
    public string $director = '';
    public string $description = '';
    public string $image ='';

    public function tableName(): string
    {
        return 'movie';
    }


    public function attributes(): array
    {
        return  ['name', 'genre', 'director', 'description', 'image'];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'genre' => 'Genre',
            'director' => 'Director',
            'description' => 'Description',
            'image' => 'Image',
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
