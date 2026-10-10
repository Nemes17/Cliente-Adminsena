<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('computer.index', compact('computers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/computers/' . $id);

        return view('computer.show', compact('computer'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $environments = $this->fetchDataFromApi($url . '/environments');

        return view('computer.create', compact('environments'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/computers', $request->all());

        return redirect()->route('computer.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $computer     = $this->fetchDataFromApi($url . '/computers/' . $id);
        $environments = $this->fetchDataFromApi($url . '/environments');

        return view('computer.edit', compact('computer', 'environments'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/computers/' . $id, $request->all());

        return redirect()->route('computer.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/computers/' . $id);

        return redirect()->route('computer.index');
    }
}
