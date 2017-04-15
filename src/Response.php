<?php

namespace Solcloud\Http;

use Solcloud\Http\Exception\HttpException;

class Response
{

    protected $statusCode;
    protected $responseHeaders = [];
    protected $responseBody = '';
    protected $lastIp = '';
    protected $realUrl = '';
    protected $exception;

    public function getLastIp(): string
    {
        return $this->lastIp;
    }

    public function setLastIp(string $lastIp): void
    {
        $this->lastIp = $lastIp;
    }

    public function getRealUrl(): string
    {
        return $this->realUrl;
    }

    public function setRealUrl(string $realUrl): void
    {
        $this->realUrl = $realUrl;
    }

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode = null)
    {
        $this->statusCode = $statusCode;
    }

    public function setBody(string $body): void
    {
        $this->responseBody = $body;
    }

    public function getBody(): string
    {
        return $this->responseBody;
    }

    public function getLastHeaders(): array
    {
        $headersCount = count($this->getAllHeaders());
        if ($headersCount > 0) {
            return $this->getAllHeaders()[$headersCount - 1];
        }

        return [];
    }

    public function getAllHeaders(): array
    {
        return $this->responseHeaders;
    }

    public function setAllHeaders(array $responseHeaders): void
    {
        $this->responseHeaders = $responseHeaders;
    }

    public function getException(): ?HttpException
    {
        return $this->exception;
    }

    public function setException(HttpException $ex): void
    {
        $this->exception = $ex;
    }

}
