<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisRequest extends FormRequest
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
            'emails' => 'required',
            'usernames' => 'required|string|alpha_num',
            'passwords' => 'required|string|alpha_num|confirmed',
        ];
    }

    public function attributes(){
        return [
            'emails' => 'email',
            'usernames' => 'username',
            'passwords' => 'password',
        ];
    }

    public function messages(){
        $required = ":attribute Cannot be Null";
        $error = "Your :attribute format is wrong!";

        return[
            '*.required' => $required,
            '*.alpha_num' => $error,
            '*.string' => $error,
            '*.confirmed' => "Your password is not same with confirmation password"
        ];
    }
}
