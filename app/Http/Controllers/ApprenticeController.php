<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function home()
    {
        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/apprentices/home/' . session('user')['id']);

        return view('apprentice.home', compact('apprentice'));
    }

    public function ofertas()
    {
        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/apprentices/home/' . session('user')['id']);
        $offers     = $this->fetchDataFromApi($url . '/apprentices/ofertas');

        return view('apprentice.ofertas', compact('apprentice', 'offers'));
    }

    public function inscribirse($course)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/apprentices/inscribirse/' . session('user')['id'] . '/' . $course);

        return redirect()->route('apprentice.home');
    }

    public function retirarme()
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/apprentices/retirarme/' . session('user')['id']);

        return redirect()->route('apprentice.ofertas');
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $apprentices = $this->fetchDataFromApi($url . '/apprentices');

        return view('apprentice.index', compact('apprentices'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);

        return view('apprentice.show', compact('apprentice'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $courses   = $this->fetchDataFromApi($url . '/courses');
        $computers = $this->fetchDataFromApi($url . '/computers');

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/apprentices', $request->all());

        return redirect()->route('apprentice.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/apprentices/' . $id);
        $courses    = $this->fetchDataFromApi($url . '/courses');
        $computers  = $this->fetchDataFromApi($url . '/computers');

        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/apprentices/' . $id, $request->all());

        return redirect()->route('apprentice.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/apprentices/' . $id);

        return redirect()->route('apprentice.index');
    }
}
