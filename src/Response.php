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
    protected $certificates = [];
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

    /**
     * @return array<string,string> lowercase header key => value
     */
    public function getLastHeadersFormatted(): array
    {
        return $this->formatHeaders($this->getLastHeaders());
    }

    public function getAllHeaders(): array
    {
        return $this->responseHeaders;
    }

    public function setAllHeaders(array $responseHeaders): void
    {
        $this->responseHeaders = $responseHeaders;
    }

    /**
     * @param string[] $headers
     * @return array<string,string> lowercase header key => value
     */
    public function formatHeaders(array $headers): array
    {
        $output = [];
        foreach ($headers as $header) {
            if (false === (is_string($header) && strpos($header, ':') > 0)) {
                continue;
            }

            $parts = explode(':', $header, 2);
            $output[strtolower($parts[0])] = trim($parts[1] ?? '');
        }

        return $output;
    }

    public function getCertificates(): array
    {
        return $this->certificates;
    }

    public function setCertificates(array $certificates): void
    {
        $this->certificates = $certificates;
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
