# Libphpsky Symfony

This is a subpackage bringing Libphpsky to Symfony.

## Installation

```bash
composer require aazsamir/libphpsky-symfony
```

## Usage

```php
<?php

namespace App\Controller;

use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;
use Aazsamir\Libphpsky\Model\Com\Atproto\Identity\ResolveHandle\ResolveHandle;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class MyController
{
    public function __construct(
        private ATProtoMetaClient $metaClient,
        private ResolveHandle $resolveHandle
    ) {}

    #[Route('/test', name: 'test')]
    public function index()
    {
        // use ATProtoMetaClient
        dd($this->metaClient->comAtprotoIdentityResolveHandle()->query('bsky.app'));
        // or plain Libphpsky type
        dd($this->resolveHandle->query('bsky.app'));
    }
}
```
## Authorization

Set the `ATPROTO_LOGIN` and `ATPROTO_PASSWORD` environment variables.

## Docs

Checkout the [Libphpsky documentation](https://aazsamir.github.io/libphpsky/) for more information.