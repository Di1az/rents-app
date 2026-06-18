@extends('layouts.base')

@section('name')
    Crea tu Cuenta
@endsection

@section('contents')
    <p class="text-center uppercase mt-5 font-bold">Crea tu cuenta</p>

    <form method="POST" action="{{ route('registry.store') }}" class="mt-14 space-y-5" novalidate>
        @csrf

        <div class="text-center">
            <label for="name">Nombre</label>

            <input id="name" 
                type="text"
                name="name"  
                placeholder="Nombre Completo"
                value="{{ old('name') }}">
        </div>

        @error('name')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="text-center">
            <label for="email">Email</label>

            <input id="email" 
                type="email" 
                name="email" 
                placeholder="Correo Electrónico"
                value="{{ old('email') }}">
        </div>

        @error('email')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="text-center">
            <label for="password">Contraseña</label>
            <input id="password" 
                type="password" 
                name="password" 
                placeholder="Ingrese una Contraseña">
        </div>

        @error('password')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="text-center">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input id="password_confirmation" 
                type="password" 
                name="password_confirmation" 
                placeholder="Confirma la Contraseña">
        </div>

        <input 
            type="submit"
            value="Crear Cuenta"
            class="">
    </form>
@endsection