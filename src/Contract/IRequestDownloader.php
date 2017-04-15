<?php

namespace Solcloud\Http\Contract;

use Solcloud\Http\Request;
use Solcloud\Http\Response;

interface IRequestDownloader
{

    public function fetchResponse(Request $request): Response;
}
