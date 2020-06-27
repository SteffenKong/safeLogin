<?php
/**
 * Created By PHPStorm
 * User: SteffenKong(Konghy)
 * Date: 2020/6/27
 * Time: 15:51
 */

namespace App\Model\services;

use App\Exceptions\AdminException;
use App\Model\dao\AdminDao;
use App\Model\Data\AdminData;
use App\Until\RSACrypt;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminService
 * @package App\Model\services
 */
class AdminService {

    /* @var AdminData $adminData */
    private $adminData;

    /* @var AdminDao $adminDao */
    private $adminDao;

    public function __construct()
    {
        $this->adminData = new AdminData();
        $this->adminDao = new AdminDao();
    }


    /**
     * @param $account
     * @param $password
     * @return array|bool
     * @throws AdminException
     * 登录逻辑
     */
    public function login($account,$password) {
        try {
            // 密码解密
            $rsa = new RSACrypt();
            $rsa->setPrivkey(\config('safe.privateKey'));
            $dePass = $rsa->decryptByPrivateKey($password);
            // 获取到个人信息
            $admin = $this->adminData->findByAccount($account);

            $salt = $admin->salt;
            $newPassword = $dePass.$salt;
            if (!Hash::check($newPassword,$admin->password)) {
                // 密码错误
                throw new AdminException('账户或密码错误!');
            }

            if (Hash::needsRehash($admin->password)) {
                $reRehashPassword = Hash::make($newPassword);
                $this->adminDao->refreshPasswordHash($admin->id,$reRehashPassword);
            }

        }catch (\Exception $e) {
            return false;
        }

        // 登录成功,返回数据
        return [
            'id' => $admin->id,
            'account' => $admin->account,
            'status' => $admin->status
        ];
    }


    /**
     * @param $account
     * @return mixed
     */
    public function findByAccount($account)
    {
        return $this->adminData->findByAccount($account);
    }
}
