<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistryRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.registry');
    }

    public function store(RegistryRequest $request) 
    {
        //Obtenemos los datos validados del request
        $data = $request->validated();
        
        //Creamos el modelo y obtenemos la instancia
        $user = User::create($data);

        //Disparamos el evento Registered
        event(new Registered($user));

        //Autenticamos el usuario, esto creará un cookie que la recuperamos en la ruta
        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
