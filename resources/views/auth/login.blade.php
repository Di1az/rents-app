@extends('layouts.auth')

@section('name')
    Iniciar Sesión
@endsection

@section('auth-contents')
    <p class="text-center uppercase mt-5 font-bold text-3xl">Inicia Sesión</p>

    @if (session('error'))
        <p class="my-10 text-center border border-red-400 bg-red-100 py-3 text-red-700 text-sm">
            {{ session('error') }}
        </p>
    @endif
    
    <form method="POST" action="{{ route('login.store') }}" class="mt-14 space-y-5" novalidate>
        @csrf

        <div class="flex flex-col gap-2">
            <label for="email" class="font-bold text-2xl">Correo</label>
            
            <input 
                id="email" 
                type="email" 
                name="email" 
                class="w-full border border-gray-300 p-3 rounded-lg"
                placeholder="Correo Electrónico"
                value="{{ old('email') }}"
                tabindex="1" />
        </div>

        @error('email')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-2">
            <div class="flex  items-center justify-between">
                <label class="font-bold text-2xl">Password</label>
                <a href="#" class="text-indigo-950" tabindex="3">¿Olvidaste tu Contraseña?</a>
            </div>
        
            <input 
                id="password" 
                type="password" 
                name="password" 
                class="w-full border border-gray-300 p-3 rounded-lg"
                placeholder="Contraseña"
                tabindex="2" />
        </div>

        @error('password')
            <p class="text-red-600">{{ $message }}</p>
        @enderror

        <input
            type="submit" 
            value='Iniciar Sesión'
            class="bg-blue-500 hover:bg-blue-900 w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer" /> 
    </form>
@endsection

