<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AdministrativeController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $administratives = $this->fetchDataFromApi($url . '/administratives');

        return view('administrative.index', compact('administratives'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $administrative = $this->fetchDataFromApi($url . '/administratives/' . $id);

        return view('administrative.show', compact('administrative'));
    }

    public function create()
    {
        return view('administrative.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/administratives', $request->all());

        return redirect()->route('administrative.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $administrative = $this->fetchDataFromApi($url . '/administratives/' . $id);

        return view('administrative.edit', compact('administrative'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/administratives/' . $id, $request->all());

        return redirect()->route('administrative.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/administratives/' . $id);

        return redirect()->route('administrative.index');
    }
}
