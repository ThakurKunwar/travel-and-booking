<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class RegionRequest extends FormRequest
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
            'name' => ['required'],
            'slug' => ['nullable', Rule::unique('regions', 'slug')->ignore($this->route('region'))],
            'description' => ['required', 'min:10', 'max:1000'],
            'is_active' => ['nullable', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }
    #[Override]
    public function prepareForValidation()
    {

        $this->merge([
            'is_active' => $this->boolean('is_active')
        ]);
    }
}
