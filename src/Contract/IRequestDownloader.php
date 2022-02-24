<?php

namespace Solcloud\Http\Contract;

use Solcloud\Http\Exception\HttpException;
use Solcloud\Http\Request;
use Solcloud\Http\Response;

interface IRequestDownloader
{

    /**
     * @throws HttpException
     */
    public function fetchResponse(Request $request): Response;
}
