<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

final class Degree extends Model
{
    protected $fillable = [
        'type', 'name', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function isActive(): bool
    {
        return $this->getAttribute('is_active');
    }

    public function isNotActive(): bool
    {
        return ! $this->isActive();
    }
}
