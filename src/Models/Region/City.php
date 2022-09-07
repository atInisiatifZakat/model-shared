<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models\Region;

use Inisiatif\ModelShared\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class City extends Model
{
    protected $fillable = [
        'code', 'province_code', 'name', 'lat', 'long',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }
}
