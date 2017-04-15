<?php

namespace Solcloud\Http;

class Request
{

    protected $url;
    protected $method = 'GET';
    protected $outgoingIp;
    protected $postFields = [];
    protected $userAgent = 'Firefox 3.6.8';
    protected $headers = [];
    protected $referer;
    protected $connectionTimeoutMs = 6000;
    protected $requestTimeoutMs = 6000;
    protected $followLocation = TRUE;
    protected $verifyPeer = TRUE;
    protected $verifyHost = TRUE;
    protected $basicHTTPAuthentication;

    public function getBasicHTTPAuthentication(): ?string
    {
        return $this->basicHTTPAuthentication;
    }

    public function setBasicHTTPAuthentication(string $username, string $password): void
    {
        $this->basicHTTPAuthentication = $username . ':' . $password;
    }

    public function getVerifyPeer(): bool
    {
        return $this->verifyPeer;
    }

    public function getVerifyHost(): bool
    {
        return $this->verifyHost;
    }

    public function setVerifyPeer(bool $verifyPeer): self
    {
        $this->verifyPeer = $verifyPeer;
        return $this;
    }

    public function setVerifyHost(bool $verifyHost): self
    {
        $this->verifyHost = $verifyHost;
        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function getReferer(): ?string
    {
        return $this->referer;
    }

    public function setReferer(string $referer = null): self
    {
        $this->referer = $referer;
        return $this;
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    public function getPostFields(): array
    {
        return $this->postFields;
    }

    public function getConnectionTimeoutSec(): int
    {
        return (int) ceil($this->connectionTimeoutMs / 1000);
    }

    public function getConnectionTimeoutMs(): int
    {
        return $this->connectionTimeoutMs;
    }

    public function getRequestTimeoutSec(): int
    {
        return (int) ceil($this->requestTimeoutMs / 1000);
    }

    public function getRequestTimeoutMs(): int
    {
        return $this->requestTimeoutMs;
    }

    public function getFollowLocation(): bool
    {
        return $this->followLocation;
    }

    /**
     * For raw data string use setPostRawDataString()
     */
    public function setPostFields(array $postFields): self
    {
        $this->postFields = $postFields;
        return $this;
    }

    public function setPostRawDataString(string $rawPostDataString): self
    {
        $this->setPostFields([$rawPostDataString]);
        return $this;
    }

    public function setConnectionTimeoutSec(int $numberOfSeconds): self
    {
        return $this->setConnectionTimeoutMs($numberOfSeconds * 1000);
    }

    public function setConnectionTimeoutMs(int $numberOfMilliseconds): self
    {
        $this->connectionTimeoutMs = $numberOfMilliseconds;
        return $this;
    }

    public function setRequestTimeoutSec(int $numberOfSeconds): self
    {
        return $this->setRequestTimeoutMs($numberOfSeconds * 1000);
    }

    public function setRequestTimeoutMs(int $numberOfMilliseconds): self
    {
        $this->requestTimeoutMs = $numberOfMilliseconds;
        return $this;
    }

    public function setFollowLocation(bool $followLocation): self
    {
        $this->followLocation = $followLocation;
        return $this;
    }

    public function getOutgoingIp(): ?string
    {
        return $this->outgoingIp;
    }

    public function setOutgoingIp(string $outgoingIp = null): self
    {
        $this->outgoingIp = $outgoingIp;
        return $this;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = mb_strtoupper($method);
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

}
