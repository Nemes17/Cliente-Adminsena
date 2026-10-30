<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $environments = $this->fetchDataFromApi($url . '/environments');

        return view('environment.index', compact('environments'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $environment = $this->fetchDataFromApi($url . '/environments/' . $id);

        return view('environment.show', compact('environment'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('environment.create', compact('trainingCenters'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/environments', $request->all());

        return redirect()->route('environment.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $environment     = $this->fetchDataFromApi($url . '/environments/' . $id);
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('environment.edit', compact('environment', 'trainingCenters'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/environments/' . $id, $request->all());

        return redirect()->route('environment.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/environments/' . $id);

        return redirect()->route('environment.index');
    }
}
