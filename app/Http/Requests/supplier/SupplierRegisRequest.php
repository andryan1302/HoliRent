<?php

namespace App\Http\Requests\supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRegisRequest extends FormRequest
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
            'email' => 'required|unique:suppliers',
            'company_name' => 'required|string|min:10',
            'password' => 'required|string|alpha_num|confirmed|min:8',
            'phone_number' => 'required|numeric',
        ];
    }

    public function attributes(){
        return [
            'email' => 'Email',  
            'company_name' => 'Company Name',  
            'password' => 'Password',  
            'phone_number' => 'Phone Number',  
        ];
    }

    public function messages(){
        $required = ":attribute Cannot be Null";
        $error = "Your :attribute format is wrong!";

        return[
            '*.required' => $required,
            '*.alpha_num' => $error,
            '*.string' => $error,
            '*.confirmed' => "Your password is not same with confirmation password",
            '*.numeric' => "Your Phone Number is not a number",
            '*.min' => "Your :attribute Must be more than :min character",
            '*.unique' => "Your :attribute is already use",
        ];
    }
}
