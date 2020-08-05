<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'max:100',
                Rule::unique('users')->ignore(auth()->user()),
                Rule::notIn(['posts', 'tags']),
            ],
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:1000000',
            'email' => [
                'required',
                'email:rfc',
                Rule::unique('users')->ignore(auth()->user()),
            ],
        ];
    }
}
