<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::acceptJson()->get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $assignments = $this->fetchDataFromApi($url . '/course-teachers');

        return view('course_teacher.index', compact('assignments'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');

        $courses  = $this->fetchDataFromApi($url . '/courses');
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('course_teacher.create', compact('courses', 'teachers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->post($url . '/course-teachers', $request->all());

        return redirect()->route('course_teacher.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');

        Http::acceptJson()->delete($url . '/course-teachers/' . $id);

        return redirect()->route('course_teacher.index');
    }
}
