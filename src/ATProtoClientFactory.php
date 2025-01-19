<?php

declare(strict_types=1);

namespace Aazsamir\LibphpskySymfony;

use Aazsamir\Libphpsky\Client\ATProtoClientBuilder;
use Aazsamir\Libphpsky\Client\ATProtoClientInterface;
use Aazsamir\Libphpsky\Client\Session\DecoratedSessionStore;
use Aazsamir\Libphpsky\Client\Session\MemorySessionStore;
use Aazsamir\Libphpsky\Client\Session\PsrCacheSessionStore;
use Psr\Cache\CacheItemPoolInterface;

class ATProtoClientFactory
{
    public function __construct(
        private CacheItemPoolInterface $cache,
        private bool $useQueryCache,
    ) {}

    public function create(): ATProtoClientInterface
    {
        $builder = ATProtoClientBuilder::default();
        $builder
            ->sessionStore(
                new DecoratedSessionStore(
                    new MemorySessionStore(),
                    new PsrCacheSessionStore(
                        $this->cache,
                    ),
                ),
            )
            ->useQueryCache($this->useQueryCache);

        if ($this->useQueryCache) {
            $builder->cache($this->cache);
        }

        return $builder->build();
    }
}
