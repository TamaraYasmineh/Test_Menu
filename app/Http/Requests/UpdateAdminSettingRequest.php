<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'admin_gold' => ['required', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'admin_maroon' => ['required', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'admin_bg' => ['required', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'admin_gold.regex' => 'اللون يجب أن يكون بصيغة hex، مثل #D4AF37.',
            'admin_maroon.regex' => 'اللون يجب أن يكون بصيغة hex، مثل #7A1F3D.',
            'admin_bg.regex' => 'اللون يجب أن يكون بصيغة hex، مثل #0F0D0B.',
        ];
    }
}
