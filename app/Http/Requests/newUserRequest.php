<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newUserRequest extends FormRequest
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
            'loginID'=> 'required | unique:users,loginID',
            'loginPassword'=> 'required',
            'loginPasswordCheck'=> 'required | same:loginPassword'
        ];
    }
}
