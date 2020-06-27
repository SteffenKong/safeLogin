<?php
/**
 * Created By PHPStorm
 * User: SteffenKong(Konghy)
 * Date: 2020/6/27
 * Time: 16:34
 */

namespace App\Model\dao;

/**
 * Class AdminDao
 * @package App\Model\dao
 */
class AdminDao {


    /**
     * @param $userId
     * @param $password
     * @return mixed
     * 重新更新哈希密码
     */
    public function refreshPasswordHash($userId,$password) {
        return Admin::where('id',$userId)
            ->update([
                'password' => $password
            ]);
    }
}
