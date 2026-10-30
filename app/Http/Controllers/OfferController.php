<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $offers = $this->fetchDataFromApi($url . '/offers');

        return view('offer.index', compact('offers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $offer = $this->fetchDataFromApi($url . '/offers/' . $id);

        return view('offer.show', compact('offer'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');

        return view('offer.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/offers', $request->all());

        return redirect()->route('offer.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $offer = $this->fetchDataFromApi($url . '/offers/' . $id);
        $areas = $this->fetchDataFromApi($url . '/areas');

        return view('offer.edit', compact('offer', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/offers/' . $id, $request->all());

        return redirect()->route('offer.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/offers/' . $id);

        return redirect()->route('offer.index');
    }
}
