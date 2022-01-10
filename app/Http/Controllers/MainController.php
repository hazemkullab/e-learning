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
        $course = Course::with('videos', 'category')->withCount('videos')->where('slug', $slug)->firstOrFail();

        $related_courses = Course::where('category_id', $course->category_id)
        ->where('id', '<>', $course->id)
        ->latest()
        ->limit(3)
        ->get();

        return view('front.course_single', compact('course', 'related_courses'));
    }

    public function login()
    {
        return view('front.login');
    }

    public function buy_course(Course $course)
    {

        $price = $course->price;
        $discount = $price * ($course->discount / 100);

        $total = $price - $discount;

        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    // "&amount=" . $course->price - $course->discount.
                    "&amount=" .  $total.
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        $checkoutId = $responseData['id'];


        return view('front.buy_course', compact('course', 'checkoutId'));
    }

}
