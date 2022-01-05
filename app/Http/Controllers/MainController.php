<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->take(5)->get();

        $latest_courses = Course::latest()->take(3)->get();

        $courses = Course::all();

        return view('front.index', compact('categories', 'courses', 'latest_courses'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        $title = $category->trans_name;
        $courses = Course::where('category_id', $category->id)->paginate(6);

        return view('front.courses', compact('title', 'courses'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function courses()
    {
        $title = 'All Courses';
        $courses = Course::paginate(6);

        return view('front.courses', compact('title', 'courses'));
    }

    public function courses_single($slug)
    {
        return $slug;
    }

    public function login()
    {
        return view('front.login');
    }


}
