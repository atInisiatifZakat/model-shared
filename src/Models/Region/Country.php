<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models\Region;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Inisiatif\Package\Contract\Common\Model\ResourceInterface;

final class Country extends Model implements ResourceInterface
{
    use HasFactory;

    protected $fillable = [
        'code', 'lat', 'long', 'name',
    ];

    public function getId(): ?string
    {
        return $this->getAttribute('id');
    }

    public function setId($id)
    {
        return $this->setAttribute('id', $id);
    }
}
