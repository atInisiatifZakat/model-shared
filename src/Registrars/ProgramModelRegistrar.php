<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Registrars;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Models\Program;
use Inisiatif\ModelShared\Models\ProgramCategory;
use Inisiatif\ModelShared\Models\SubProgramCategory;

final class ProgramModelRegistrar
{
    private readonly array $config;

    private function __construct(array $config)
    {
        Assert::keyExists($config, 'connection');
        Assert::keyExists($config, 'migration');

        Assert::keyExists($config, 'tables');
        Assert::keyExists($config, 'models');

        $this->config = $config;
    }

    public static function make(array $config): self
    {
        return new self($config);
    }

    public function runningModelMigration(): bool
    {
        return (bool) Arr::get($this->config, 'migration');
    }

    public function getConnectionName(): string
    {
        return Arr::get($this->config, 'connection');
    }

    public function getProgramTableName(): string
    {
        return Arr::get($this->config, 'tables.program', 'programs');
    }

    /**
     * @return class-string<Model>
     */
    public function getProgramModelClass(): string
    {
        return Arr::get($this->config, 'models.program', Program::class);
    }

    public function getProgramModel(): Model
    {
        return app(
            $this->getProgramModelClass()
        );
    }

    public function getProgramCategoryTableName(): string
    {
        return Arr::get($this->config, 'tables.program_category', 'program_categories');
    }

    /**
     * @return class-string<Model>
     */
    public function getProgramCategoryModelClass(): string
    {
        return Arr::get($this->config, 'models.program_category', ProgramCategory::class);
    }

    public function getProgramCategoryModel(): Model
    {
        return app(
            $this->getProgramCategoryModelClass()
        );
    }

    public function getSubProgramCategoryTableName(): string
    {
        return Arr::get($this->config, 'tables.sub_program_category', 'sub_program_categories');
    }

    /**
     * @return class-string<Model>
     */
    public function getSubProgramCategoryModelClass(): string
    {
        return Arr::get($this->config, 'models.sub_program_category', SubProgramCategory::class);
    }

    public function getSubProgramCategoryModel(): Model
    {
        return app(
            $this->getSubProgramCategoryModelClass()
        );
    }
}
