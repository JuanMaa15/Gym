<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IniciarPlanAlimenticioRequest extends FormRequest
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
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date'],
            'descripcion' => ['required', 'string']
        ];
    }
}
