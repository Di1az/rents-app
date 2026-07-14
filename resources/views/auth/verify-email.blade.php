@extends('layouts.auth')

@section('name')
    Crear Cuenta
@endsection

@section('auth-contents')
    <p class="mt-5 text-lg">Tu cuenta fue creada con éxito. Ahora solo debes confirmarla, revisa tu e-mail.</p>

    @if (session('success'))
        <p class="my-10 text-center border border-green-400 bg-green-100 py-3 text-green-700 text-sm">
            {{ session('success') }}
        </p>
    @endif

    <form method="POST" action="{{ route('verification.name') }}">
        <input
            type="submit"
            class="bg-amber-500 w-full text-center mt-5 px-5 py-2 uppercase font-bold cursor-pointer"
            value="Reenviar correo de verificación"
        >
    </form>
@endsection

