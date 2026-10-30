<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function home()
    {
        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/teachers/home/' . session('user')['id']);
        $courses = $teacher['courses'] ?? [];

        return view('teacher.home', compact('teacher', 'courses'));
    }

    public function misAprendices($course)
    {
        $url = env('URL_SERVER_API');

        $course = $this->fetchDataFromApi($url . '/teachers/course/' . $course . '/apprentices');
        $apprentices = $course['apprentices'] ?? [];

        return view('teacher.students', compact('course', 'apprentices'));
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('teacher.index', compact('teachers'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teacher.show', compact('teacher'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $areas           = $this->fetchDataFromApi($url . '/areas');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('teacher.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/teachers', $request->all());

        return redirect()->route('teacher.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');

        $teacher         = $this->fetchDataFromApi($url . '/teachers/' . $id);
        $areas           = $this->fetchDataFromApi($url . '/areas');
        $trainingCenters = $this->fetchDataFromApi($url . '/training-centers');

        return view('teacher.edit', compact('teacher', 'areas', 'trainingCenters'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->put($url . '/teachers/' . $id, $request->all());

        return redirect()->route('teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/teachers/' . $id);

        return redirect()->route('teacher.index');
    }
}
