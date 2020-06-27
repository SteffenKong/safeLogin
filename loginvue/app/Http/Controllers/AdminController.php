<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\LoginRequest;
use App\Model\services\AdminService;
use Illuminate\Http\Request;
use App\Until\JwtTool;

/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{

    /* @var AdminService $adminService */
    private $adminService;

    public function __construct()
    {
        $this->adminService = new AdminService();
    }


    /**
     * @param LoginRequest $request
     * @return false|string
     * @throws \App\Exceptions\AdminException
     */
    public function login(LoginRequest $request) {
        $account = $request->get('account');
        $password = $request->get('password');


        // 找出该用户是否存在
        $admin = $this->adminService->findByAccount($account);

        if (!$admin) {
            return json_encode([
                'code' => '001',
                'msg' => '用户不存在'
            ],JSON_UNESCAPED_UNICODE);
        }

        // 查询数据库
        $admin = $this->adminService->login($account,$password);
        if (!$admin) {
            return json_encode([
                'code' => '001',
                'msg' => '登录失败'
            ],JSON_UNESCAPED_UNICODE);
        }


        // 判断用户是否禁用
        if (!$admin['status']) {
            return json_encode([
                'code' => '001',
                'msg' => '用户已被禁用, 请联系管理员'
            ],JSON_UNESCAPED_UNICODE);
        }


        // 生成token
        $token = JwtTool::getInstance(\config('jwtSecrt'))->makeToken($admin);

        // 返回接口
        return json_encode([
            'code' => '000',
            'msg' => '登录成功',
            'extra' => [
                'token' => $token
            ]
        ],JSON_UNESCAPED_UNICODE);
    }


    /**
     * @return false|string
     */
    public function getPublicKey() {
        return json_encode([
            'code' => '000',
            'msg' => '获取成功',
            'extra' => [
                'publicKey' => \config('safe.publicKey')
            ]
        ],JSON_UNESCAPED_UNICODE);
    }
}
