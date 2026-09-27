<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'restaurant_id' => ['required', 'exists:restaurants,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9_-]+$/',
                Rule::unique('categories', 'slug')
                    ->where(fn($query) => $query->where('restaurant_id', $this->restaurant_id))
                    ->ignore($this->route('category')),
            ],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'restaurant_id.required' => 'يجب اختيار المطعم.',
            'slug.regex' => 'الرابط المختصر يجب أن يحتوي فقط أحرفًا إنكليزية وأرقامًا وشرطة (-) أو شرطة سفلية (_).',
            'slug.unique' => 'هذا الرابط مستخدم بالفعل في تصنيف آخر لنفس المطعم.',
        ];
    }
}
