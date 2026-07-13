@extends('layouts.auth')

@section('name')
    Crea tu Cuenta
@endsection

@section('auth-contents')
    <p class="text-center uppercase mt-5 font-bold text-3xl">Crear cuenta</p>

    <form method="POST" action="{{ route('registry.store') }}" class="mt-14 space-y-5" novalidate>
        @csrf

        <div class="space-y-2">
            <label class="font-bold text-2xl block" for="name">Nombre</label>

            <input id="name" 
                type="text"
                name="name"
                class="w-full border border-gray-300 p-3 rounded-lg"  
                placeholder="Nombre Completo"
                value="{{ old('name') }}" />
        </div>

        @error('name')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="space-y-2">
            <label class="font-bold text-2xl block" for="email">Email</label>

            <input id="email" 
                type="email" 
                name="email" 
                class="w-full border border-gray-300 p-3 rounded-lg"
                placeholder="Correo Electrónico"
                value="{{ old('email') }}" />
        </div>

        @error('email')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="space-y-2">
            <label class="font-bold text-2xl block" for="password">Contraseña</label>
            <input id="password" 
                type="password" 
                name="password" 
                class="w-full border border-gray-300 p-3 rounded-lg"
                placeholder="Ingrese una Contraseña" />
        </div>

        @error('password')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="space-y-2">
            <label class="font-bold text-2xl block" for="password_confirmation">Confirmar Contraseña</label>
            <input id="password_confirmation" 
                type="password" 
                name="password_confirmation" 
                class="w-full border border-gray-300 p-3 rounded-lg"
                placeholder="Confirma la Contraseña" />
        </div>

        <input 
            type="submit"
            value="Registrarme"
            class="bg-blue-500 hover:bg-blue-900 w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer">
    </form>
@endsection