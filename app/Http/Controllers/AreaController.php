<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');

        return view('area.index', compact('areas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('area.show', compact('area'));
    }

    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach('imagen', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
        ->post($url . '/areas', ['name' => $request->name,]);

        return redirect()->route('area.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('area.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/areas/' . $id, $request->all());

        return redirect()->route('area.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/areas/' . $id);

        return redirect()->route('area.index');
    }
}