<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
        return $validator = [
            'email' => 'required',
            'password' => 'required|string|alpha_num',
        ];
    }

    public function attributes(){
        return [
            'email' => 'Email',
            'password' => 'password'
        ];
    }

    public function messages(){
        $required = ":attribute Cannot be Null";
        $error = "Your :attribute format is wrong!";

        return[
            '*.required' => $required,
            '*.alpha_num' => $error,
            '*.string' => $error,
        ];
    }
}
