<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models\Region;

use Inisiatif\ModelShared\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class District extends Model
{
    protected $fillable = [
        'code', 'city_code', 'name', 'lat', 'long',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }
}
