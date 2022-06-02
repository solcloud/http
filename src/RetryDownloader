<?php

namespace Solcloud\Http;

use Solcloud\Http\Contract\IRequestDownloader;
use Solcloud\Http\Exception\HttpException;

class RetryDownloader implements IRequestDownloader
{

    /**
     * @var IRequestDownloader
     */
    private $downloader;
    private $retryCount;
    private $retrySleepSec;
    private $successStatusCode;

    public function __construct(IRequestDownloader $downloader, int $retryCount = 3, int $retrySleepSec = 5, int $successStatusCode = 200)
    {
        $this->downloader = $downloader;
        $this->retryCount = $retryCount;
        $this->retrySleepSec = $retrySleepSec;
        $this->successStatusCode = $successStatusCode;
    }

    public function fetchResponse(Request $request): Response
    {
        for ($i = 0; $i <= $this->retryCount; $i++) {
            try {
                $response = $this->downloader->fetchResponse($request);
                if ($response->getStatusCode() !== $this->successStatusCode) {
                    throw new HttpException("Response status code '{$response->getStatusCode()}' !== '{$this->successStatusCode}' successStatusCode");
                }
                return $response;
            } catch (HttpException $ex) {
                if ($i < $this->retryCount) {
                    sleep($this->retrySleepSec);
                }
            }
        }

        throw $ex;
    }

}
