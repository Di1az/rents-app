<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegistryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:50', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/u'],
            'email' => ['required','email'],
            'password' => ['required', 'confirmed', Password::min(2)
                // ->mixedCase()
                // ->symbols()
                // ->numbers()
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.requirde' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 50 caracteres.',
            'name.regex' => 'El nombre solo puede contener letras y acentos.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El formato del email es incorrecto.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe de tener mínimo 8 caracteres.',
            'password.mixed' => 'La Contraseña debe tener al menos una letra mayúscula y una letra minúscula',
            'password.symbols' => 'La Contraseña debe tener al menos una caractér especial',
            'password.numbers' => 'La Contraseña debe tener al menos un número',
        ];
    }
}
