<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Tests;

use Inisiatif\ModelShared\ModelSharedServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ModelSharedServiceProvider::class,
        ];
    }
}
