<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'bio' => 'string|nullable',
            'twitter' => 'active_url|nullable',
            'github' => 'active_url|nullable',
            'linkedin' => 'active_url|nullable',
            'instagram' => 'active_url|nullable',
            'facebook' => 'active_url|nullable',
            'website' => 'active_url|nullable',
            'work_as' => 'string|nullable',
            'work_at' => 'string|required_with:work_as|nullable',
            'birth_date' => 'date|nullable',
        ];
    }
}
