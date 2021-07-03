<?php

namespace App\Http\Requests\supplier\bus;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'plat_nomor' => 'required',
            'nama_bus' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png',
        ];
    }

    public function attributes(){
        return [
            'plat_nomor' => 'Plate Number',
            'nama_bus' => 'Name Bus',
            'tipe' => 'Type',
            'harga' => 'Price',
            'gambar' => 'Image',
        ];
    }

    public function messages(){
        $required = ":attribute Cannot Be Null!!";
        $error = ":attribute! Format Is Wrong";

        return[
            '*.required' => $required,
            '*.string' => $error,
            '*.numeric' => $error,
            '*.mimes' => $error,
        ];
    }
}
