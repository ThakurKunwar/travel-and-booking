<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', Rule::unique('packages', 'slug')->ignore($this->route('package'))],
            'region_id' => ['required', 'exists:regions,id'], // validates region actually exists in db
            'price' => ['required', 'numeric', 'min:0'],       // decimal like 99.99
            'duration_days' => ['required', 'integer', 'min:1'], // whole number like 7
            'description' => ['required', 'string', 'min:10'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png'], // single image
            'images.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png'], // multiple images
        ];
    }
    #[Override]
    public function prepareForValidation()
    {
        $this->array_merge(
            [
                'is_active' => $this->boolean('is_active')
            ]
        );
    }
}
