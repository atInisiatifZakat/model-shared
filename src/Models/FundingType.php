<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class FundingType extends Model
{
    protected $table = 'edonation.funding_types';

    public function category(): BelongsTo
    {
        return $this->belongsTo(FundingCategory::class, 'funding_category_id')->withoutGlobalScopes();
    }
}
