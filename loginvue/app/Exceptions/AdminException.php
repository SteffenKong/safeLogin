<?php

namespace App\Exceptions;

use Exception;

class AdminException extends Exception{


    /**
     * @param $request
     * @param Exception $exception
     * @return false|string
     */
    public function handle($request,Exception $exception) {
        return json_encode([
            'code' => '004',
            'msg' => $exception->getMessage()
        ]);
    }
}
