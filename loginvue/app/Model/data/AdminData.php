<?php
/**
 * Created By PHPStorm
 * User: SteffenKong(Konghy)
 * Date: 2020/6/27
 * Time: 15:58
 */

namespace App\Model\Data;

use App\Model\entity\Admin;

/**
 * Class AdminData
 * @package App\Model\Data
 */
class AdminData {


    /**
     * @param $adminId
     * @return mixed
     */
    public function find($adminId) {
        return Admin::where('id',$adminId)->first();
    }


    /**
     * @param $account
     * @param $password
     * @return mixed
     */
    public function login($account,$password) {
        return Admin::where('account',$account)
            ->where('password',$password)
            ->first();
    }


    /**
     * @param $account
     * @return mixed
     */
    public function findByAccount($account) {
        return Admin::where('account',$account)->first();
    }
}
