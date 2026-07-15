<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        if(!Auth::attempt($data)) {
            return redirect()->route('login')
                ->with('error', 'Las credenciales son incorrectas');
        }

        return redirect()->route('dashboard');
    }
}
