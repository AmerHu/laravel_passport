<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'                => 'required|string',
            'last_name'                 => 'required|string',
            'phone_number'              => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9\',',
            'date_of_birth'             => 'date_format:Y-m-d H:i:s',
            'image'                     => 'file|size:5120',
            'terms_and_conditions'      => 'required|bool',
            'country'                   => 'required|string',
            'city'                      => 'string',
            'gender'                    => 'string',
            'email'                     => 'email',
            'password'                  => 'required|string'
        ];
    }
}
