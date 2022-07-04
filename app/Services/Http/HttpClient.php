<?php

namespace App\Services\Http;

use ArrayAccess;
use App\Exceptions\HttpException;


class HttpClient
{
    protected object $source;

    public function __construct(object $source)
    {
        $this->source = $source;
    }


    public function get(string $url, array $property = []) : ArrayAccess
    {
            $url = empty($property) ? $url : $url . "?" . implode("&", $property);
            $response = $this->source::get($url);
            if (!$response) throw new HttpException("error");
            return $response;
    }

}
