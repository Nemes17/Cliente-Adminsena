<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $courses = $this->fetchDataFromApi($url . '/courses');

        return view('course.index', compact('courses'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $course = $this->fetchDataFromApi($url . '/courses/' . $id);

        return view('course.show', compact('course'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $areas           = $this->fetchDataFromApi($url . '/areas');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');
        $environments    = $this->fetchDataFromApi($url . '/environments');
        $offers          = $this->fetchDataFromApi($url . '/offers');

        return view('course.create', compact('areas', 'trainingCenters', 'environments', 'offers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/courses', $request->all());

        return redirect()->route('course.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $course          = $this->fetchDataFromApi($url . '/courses/' . $id);
        $areas           = $this->fetchDataFromApi($url . '/areas');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');
        $environments    = $this->fetchDataFromApi($url . '/environments');
        $offers          = $this->fetchDataFromApi($url . '/offers');

        return view('course.edit', compact('course', 'areas', 'trainingCenters', 'environments', 'offers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/courses/' . $id, $request->all());

        return redirect()->route('course.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/courses/' . $id);

        return redirect()->route('course.index');
    }
}
