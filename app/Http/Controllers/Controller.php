<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $headers = [
        'Access-Control-Allow-Origin' => '*',
        "Access-Control-Allow-Credentials" => "true",
        "Access-Control-Allow-Methods" => " GET, PUT, POST, DELETE, OPTIONS",
        "Access-Control-Allow-Headers" => "Origin, Content-Type, X-Auth-Token , Authorization",
    ];

    public function respondSuccess()
    {
        return response()
            ->json(['message' => 'success'])
            ->withHeaders($this->headers);
    }

    public function respondError()
    {
        return response()
            ->json(['message' => 'false'])
            ->withHeaders($this->headers);

    }

    public function respondData($data)
    {
        return response()
            ->json($data)
            ->withHeaders($this->headers);
    }

}
