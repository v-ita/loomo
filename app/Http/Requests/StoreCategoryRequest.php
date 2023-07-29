<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
	{
		$this->merge([
			'slug' => Str::slug($this->input('slug'))
		]);
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'parent_id' => ['nullable', 'integer', 'exists:App\Models\Category,id'],
			'name' => ['bail', 'string', 'required'],
			'slug' => ['bail', 'string', 'required', 'unique:App\Models\Category,slug'],
        ];
    }
}
