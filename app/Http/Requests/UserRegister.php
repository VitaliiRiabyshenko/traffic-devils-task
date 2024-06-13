<?php

namespace App\Http\Requests;

use App\Enum\RoleEnum;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRegister extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'team_lead_id' => 'nullable|'. Rule::requiredIf(function () {
                return $this->role_id == Role::where('name', RoleEnum::BAYER->value)->first()->id;
            }),
            'role_id' => 'required|exists:roles,id',
        ];
    }
}
