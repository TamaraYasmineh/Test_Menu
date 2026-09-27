<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    protected $fillable = [
        'admin_gold',
        'admin_maroon',
        'admin_bg',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'admin_gold' => '#D4AF37',
            'admin_maroon' => '#7A1F3D',
            'admin_bg' => '#0F0D0B',
        ]);
    }
}
