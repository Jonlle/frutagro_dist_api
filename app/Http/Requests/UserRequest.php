<?php

namespace App\Http\Requests;

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
            'username' => 'required|max:10',
            'doc_type_id' => 'required|max:3',
            'role_id' => 'required|max:6',
            'status_id' => 'required|max:2',
            'first_name' => 'required',
            'last_name' => 'required',
            'document' => 'required',
            'password' => 'required'
        ];
    }
}
