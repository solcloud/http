<?php

namespace Solcloud\Http\Exception;

use Exception;

class HttpException extends Exception
{

    protected $lastUrl = '';
    protected $lastIP = '';

    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null, string $lastUrl = '', string $lastIP = '')
    {
        parent::__construct($message, $code, $previous);
        $this->setLastUrl($lastUrl);
        $this->setLastIP($lastIP);
    }

    public function getLastUrl(): string
    {
        return $this->lastUrl;
    }

    public function setLastUrl(string $url): void
    {
        $this->lastUrl = $url;
    }

    public function getLastIP(): string
    {
        return $this->lastIP;
    }

    public function setLastIP(string $ip): void
    {
        $this->lastIP = $ip;
    }

}
