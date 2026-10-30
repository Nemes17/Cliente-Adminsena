<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $url = env('URL_SERVER_API');

        $response = Http::acceptJson()->post($url . '/login', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            session([
                'token' => $data['token'] ?? null,
                'user'  => $data['user']  ?? null,
            ]);

            if ($data['user']['rol'] == 'instructor') {
                return redirect()->route('teacher.home');
            }

            if ($data['user']['rol'] == 'aprendiz') {
                return redirect()->route('apprentice.home');
            }

            return redirect()->route('home');
        }

        return back()->withErrors(['El usuario o la contraseña son incorrectos.']);
    }

    public function logout()
    {
        session()->flush();

        return redirect()->route('login');
    }
}
