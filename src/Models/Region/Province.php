<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models\Region;

use Inisiatif\ModelShared\Models\Model;

final class Province extends Model
{
    protected $fillable = [
        'code', 'name', 'lat', 'long',
    ];
}
