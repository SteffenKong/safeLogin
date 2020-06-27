<?php

namespace App\Model\entity;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Admin
 * @package App\Model
 */
class Admin extends Model
{

    protected $table = 'admin';

    public $incrementing = true;

    protected $fillable = [
        'id',
        'account',
        'password',
        'status',
        'created_at',
        'updated_at'
    ];
}
