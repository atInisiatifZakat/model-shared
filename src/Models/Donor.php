<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Inisiatif\ModelShared\Registrars\DonorModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonorPhoneModelRegistrar;

final class Donor extends Model
{
    use HasUuids;

    public function getConnectionName(): ?string
    {
        /** @var DonorModelRegistrar $registrar */
        $registrar = app(DonorModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var DonorModelRegistrar $registrar */
        $registrar = app(DonorModelRegistrar::class);

        return $registrar->getTableName();
    }

    public function phones(): HasMany
    {
        /** @var DonorPhoneModelRegistrar $registrar */
        $registrar = app(DonorPhoneModelRegistrar::class);

        return $this->hasMany($registrar->getModelClassName());
    }

    public function phone(): BelongsTo
    {
        /** @var DonorPhoneModelRegistrar $registrar */
        $registrar = app(DonorPhoneModelRegistrar::class);

        return $this->belongsTo($registrar->getModelClassName(), 'donor_phone_id');
    }

    public function getNotificationChannels(): ?array
    {
        $channels = $this->getAttribute('notification_channels');

        if ($channels === null || count($channels) === 0) {
            return ['EMAIL', 'SMS'];
        }

        if (\in_array(\mb_strtoupper('whatsapp'), $channels, true)) {
            return $this->isSupportedWhatsApp() ? $channels : ['EMAIL', 'SMS'];
        }

        return $channels;
    }

    public function isSupportedChannels(string $channel): bool
    {
        $channels = $this->getNotificationChannels();

        return $channels === null || \in_array(mb_strtoupper($channel), $channels, true);
    }

    public function sendSms(): bool
    {
        return $this->shouldSendNotify() && $this->isSupportedChannels('SMS');
    }

    public function sendEmail(): bool
    {
        return $this->shouldSendNotify() && $this->isSupportedChannels('EMAIL') && $this->haveValidEmail();
    }

    public function sendWhatsApp(): bool
    {
        return $this->shouldSendNotify() && $this->isSupportedChannels('WHATSAPP');
    }

    public function shouldSendNotify(): bool
    {
        return $this->getKey() !== config('donor.default_donor_id');
    }
}
