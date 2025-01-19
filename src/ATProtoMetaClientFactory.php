<?php

declare(strict_types=1);

namespace Aazsamir\LibphpskySymfony;

use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Model\Meta\ATProtoMetaClient;

class ATProtoMetaClientFactory
{
    public function __construct(
        private ATProtoClientInterface $client,
    ) {}

    public function create(): ATProtoMetaClient
    {
        return new ATProtoMetaClient($this->client);
    }
}
