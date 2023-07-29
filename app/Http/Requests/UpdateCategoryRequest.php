<?php

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'parent_id' => [
                'nullable', 
                'integer', 
                'exists:App\Models\Category,id', 
                'not_in:' . $this->route('category')->id ## Category that can't be the parent of the current category.
            ],
            'name' => ['nullable', 'string'],
            'slug' => ['nullable', 'string', 'unique:App\Models\Category,slug,' . $this->route('category')->id],
        ];
    }
}
