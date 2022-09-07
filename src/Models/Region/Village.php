<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models\Region;

use Inisiatif\ModelShared\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Village extends Model
{
    protected $fillable = [
        'code', 'district_code', 'name', 'lat', 'long', 'pos',
    ];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
