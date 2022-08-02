<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'address' => 'required|min:10',
            'phonenumber' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El nombre es obligatorio',
            'lastname.required' => 'El apellido es obligatorio',
            'address.required' => 'La direccion es obligatoria',
            'phonenumber.required' => 'El numero de telefono es obligatorio',
        ];
    }
}
