<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstructorRequest extends FormRequest
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
            'id' => ['required', 'integer', 'unique:personal'],
            'nombre' => ['required', 'string'],
            'apellido' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'descripcion' => ['nullable'],
            'tipo_personal_id' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'unique:personal'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }
}
