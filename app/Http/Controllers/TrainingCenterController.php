<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
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

        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('training_center.index', compact('trainingCenters'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $trainingCenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('training_center.show', compact('trainingCenter'));
    }

        public function create()
    {
        return view('training_center.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/training-centers', $request->all());

        return redirect()->route('training_center.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $trainingCenter = $this->fetchDataFromApi($url . '/training-centers/' . $id);

        return view('training_center.edit', compact('trainingCenter'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/training-centers/' . $id, $request->all());

        return redirect()->route('training_center.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/training-centers/' . $id);

        return redirect()->route('training_center.index');
    }
}