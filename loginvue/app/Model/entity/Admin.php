<?php

namespace App\Model\entity;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Admin
 *
 * @package App\Model
 * @property int $id
 * @property string $account 账号
 * @property string $password 密码
 * @property string|null $salt 盐值
 * @property int|null $status 状态 0 - 禁用 1 - 启用
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin whereSalt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\entity\Admin whereUpdatedAt($value)
 * @mixin \Eloquent
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
