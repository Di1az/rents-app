@extends('layouts.base')

@section('name')
    Crea tu Cuenta
@endsection

@section('contents')
    <p class="text-center uppercase mt-5 font-bold">Crea tu cuenta</p>

    <form method="POST" action="{{ route('registry.store') }}" class="mt-7">
        @csrf

        <div class="text-center">
            <label for="name">Nombre</label>

            <input id="name" 
                type="text"
                name="name"  
                placeholder="Nombre Completo"/>
        </div>

        <div class="text-center">
            <label for="email">Email</label>

            <input id="email" 
                type="email" 
                name="email" 
                placeholder="Correo Electrónico">
        </div>

        <div class="text-center">
            <label for="password">Contraseña</label>
            <input id="password" 
                type="password" 
                name="password" 
                placeholder="Ingrese una Contraseña">
        </div>

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