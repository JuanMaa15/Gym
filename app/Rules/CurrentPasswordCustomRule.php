<?php

namespace App\Rules;

use App\Models\Personal;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CurrentPasswordCustomRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $personal = Personal::where('id', auth('personal')->user()->id)->first();

        return Hash::check($value, $personal->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La contraseña es incorrecta';
    }
}
