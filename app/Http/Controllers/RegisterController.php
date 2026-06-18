<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistryRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.registry');
    }

    public function store(RegistryRequest $request) 
    {
        //Obtengo los datos validados del request
        $data = $request->validated();
        
        //Creamos el modelo y obtenemos la instancia
        $user = User::create($data);
    }
}
