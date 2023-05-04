<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\CurrentPasswordCustomRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    public function update(Request $request): RedirectResponse
    {       
                 
        $validated = $request->validate([ 
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'La contraseña se actualizó correctamente!');
    }

    public function updatePersonal(Request $request): RedirectResponse
    {       
                 
        $validated = $request->validate([ 
            'current_password' => ['required', new CurrentPasswordCustomRule],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user('personal')->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'La contraseña se actualizó correctamente!');
    }
}
