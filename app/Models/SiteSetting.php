<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
    ];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        $setting = static::query()->where('key', $key)->first();

        return $setting?->value ?? $default;
    }

    public static function setValue(string $key, ?string $value, string $type = 'string', ?string $group = null): self
    {
        /** @var self $setting */
        $setting = static::query()->firstOrNew(['key' => $key]);
        $setting->value = $value;
        $setting->type = $type;
        $setting->group = $group;
        $setting->save();

        return $setting;
    }

    public static function normalizeWhatsappNumber(mixed $value, string $defaultCountryCode = '62'): string
    {
        $stringValue = trim((string) ($value ?? ''));
        if ($stringValue === '') {
            return '';
        }

        // Strip all non-digits. Supports inputs like: +62 812-xxx, 0812xxxx, 812xxxx
        $digits = (string) preg_replace('/\D+/', '', $stringValue);
        if ($digits === '') {
            return '';
        }

        // Normalize common Indonesian formats to 62xxxxxxxxxx
        if (str_starts_with($digits, '00')) {
            $digits = substr($digits, 2);
        }

        if (str_starts_with($digits, $defaultCountryCode . '0')) {
            $digits = $defaultCountryCode . substr($digits, strlen($defaultCountryCode) + 1);
        }

        if (str_starts_with($digits, '0')) {
            $digits = $defaultCountryCode . substr($digits, 1);
        } elseif (str_starts_with($digits, '8')) {
            $digits = $defaultCountryCode . $digits;
        }

        return $digits;
    }
}
