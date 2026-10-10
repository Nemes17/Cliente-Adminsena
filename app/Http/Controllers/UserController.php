<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
     // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $users = $this->fetchDataFromApi($url . '/users');

        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $user = $this->fetchDataFromApi($url . '/users/' . $id);

        return view('user.show', compact('user'));
    }
    
}
