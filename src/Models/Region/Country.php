<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models\Region;

use Inisiatif\ModelShared\Models\Model;

final class Country extends Model
{
    protected $fillable = [
        'code', 'lat', 'long', 'name',
    ];
}
