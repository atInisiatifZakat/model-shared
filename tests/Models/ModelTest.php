<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Tests\Models;

use Inisiatif\ModelShared\Tests\TestCase;
use Inisiatif\ModelShared\Tests\Stubs\ModelTesting;

final class ModelTest extends TestCase
{
    public function testMustBeReturnTableNameFromConfig(): void
    {
        config()->set('shared.tables.model_testing', 'foobar');

        $model = new ModelTesting();

        $this->assertSame('foobar', $model->getTable());
    }

    public function testMustBeReturnDefaultTableNameIfNotExistsInConfig(): void
    {
        $model = new ModelTesting();

        $this->assertSame('model_testings', $model->getTable());
    }
}
