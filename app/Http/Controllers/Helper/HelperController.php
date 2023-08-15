<?php

namespace App\Http\Controllers\Helper;

use Throwable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    public $response = [];

    function __construct()
    {
        $this->response['error'] = 0;
        $this->response['msg'] = '';
        $this->response['data'] = '';
        $this->response['dataCount'] = 0;
    }

    // UIDs
    public static function getUid()
    {
        $bytes = random_bytes(10);
        $base64 = base64_encode($bytes);
        return rtrim(strtr($base64, '+/', '-_'), '=');
    }

}
