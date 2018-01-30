<?php

namespace App\Repositories\Admin;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }
}
