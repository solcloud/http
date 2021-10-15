# HTTP

Http _Request_ and _Response_ object, _IRequestDownloader_ interface and _HttpException_ base class. For curl implementation see https://github.com/solcloud/curl

## Request

```php
$request = new \Solcloud\Http\Request();
$request
    ->setUrl('https://www.google.com/')
    ->setConnectionTimeoutSec(1)
    ->setRequestTimeoutSec(2)
    ->setHeaders([
        'X-header: x-value',
    ])
    ->setReferer('about:blank')
    ->setUserAgent('solcloud-curl')
;
```

## Response

```php
$response = new \Solcloud\Http\Response();
$response->setBody('response body');
$response->setStatusCode(200);
```

## Interface

```php
interface IRequestDownloader
{

    public function fetchResponse(Request $request): Response;
}
```
