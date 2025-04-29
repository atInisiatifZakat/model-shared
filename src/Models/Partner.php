<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Partner extends Model
{
    protected $table = 'edonation.partners';

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class)->withoutGlobalScopes();
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class)->withoutGlobalScopes();
    }
}
