<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePermissionRoleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $role_id = $this->input('role_id');
        $permission_id = $this->input('permission_id');

        return [
            'role_id' => ['required', 'integer', 'exists:App\Models\Role,id', Rule::unique('permission_roles')->where(function ($query) use ($role_id, $permission_id) {
                return $query->where('role_id', $role_id)->where('permission_id', $permission_id);
            })],
            'permission_id' => ['required', 'integer', 'exists:App\Models\Permission,id'],
        ];
    }
}
