<?php

namespace App\Http\Controllers\Helper;

use Throwable;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Support\Facades\Request;

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

    public function getDivisions()
    {
        try {
            $divisions = Division::all();
            $this->response['data'] = $divisions;
            $this->response['dataCount'] = count($this->response['data']);
            $this->response['msg'] = $this->response['dataCount'] === 0 ? 'No data found' : '';
        } catch (Throwable $th) {
            $this->response['error'] = 1;
            $this->response['msg'] = 'Something went wrong, try again later!';
        }

        return $this->response;
    }

    public function getPositions()
    {
        try {
            $positions = Position::all();
            $this->response['data'] = $positions;
            $this->response['dataCount'] = count($this->response['data']);
            $this->response['msg'] = $this->response['dataCount'] === 0 ? 'No data found' : '';
        } catch (Throwable $th) {
            $this->response['error'] = 1;
            $this->response['msg'] = 'Something went wrong, try again later!';
        }

        return $this->response;
    }

}
