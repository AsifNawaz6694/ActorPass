<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
        //dd(123);
        /*return [
            //
            'fullname' =>'required|string|max:191',
            'email' =>'required|unique:users|max:191',
            'username' =>'required|string|max:191',
            'password' =>'required|confirmed|min:6'
        ]; */
    }
}
