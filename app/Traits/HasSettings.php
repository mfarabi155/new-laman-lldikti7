<?php

namespace App\Traits;

use App\Models\SettingVariable;

trait HasSettings
{
    public function getSetting($name, $default = null)
    {
        // Gunakan try-catch agar tidak error saat migrasi database belum jalan
        try {
            $setting = SettingVariable::where('name', $name)->first();
            return $setting ? $setting->value : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }

    public function getSettings(array $names = null)
    {
        try {
            if ($names) {
                return SettingVariable::whereIn('name', $names)->pluck('value', 'name');
            }
            return SettingVariable::pluck('value', 'name');
        } catch (\Exception $e) {
            return collect([]);
        }
    }
}