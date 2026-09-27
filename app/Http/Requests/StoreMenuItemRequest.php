<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMenuItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9_-]+$/',
                Rule::unique('menu_items', 'slug')
                    ->where(fn($query) => $query->where('category_id', $this->category_id)),
            ],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_available' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'يجب اختيار التصنيف.',
            'price.numeric' => 'السعر يجب أن يكون رقمًا.',
            'slug.regex' => 'الرابط المختصر يجب أن يحتوي فقط أحرفًا إنكليزية وأرقامًا وشرطة (-) أو شرطة سفلية (_).',
            'slug.unique' => 'هذا الرابط مستخدم بالفعل في صنف آخر لنفس التصنيف.',
        ];
    }
}
