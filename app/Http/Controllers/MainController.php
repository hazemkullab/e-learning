<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\User;
use App\Models\Video;
use App\Services\SMS;
use App\Models\Course;
use App\Models\Category;
use Checkout\CheckoutApi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Checkout\Models\Tokens\Card;
use App\Notifications\NewPayment;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Checkout\Models\Payments\Payment;
use Checkout\Models\Payments\TokenSource;

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

        $user = User::where('email', 'moh@gmail.com')->first();

        $user->notify(new NewPayment);

        //$this->sms('0592418889', 'رسالة اخرى');

        // SMS::send('0592418889', 'رسالة جديدة');
        // $sms = new SMS;
        // $sms->send('0592418889', 'رسالة اخرى');

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

        // $price = $course->price;
        // $discount = $price * ($course->discount / 100);

        // $total = $price - $discount;

        // $url = "https://eu-test.oppwa.com/v1/checkouts";
        // $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
        //             // "&amount=" . $course->price - $course->discount.
        //             "&amount=" .  $total.
        //             "&currency=USD" .
        //             "&paymentType=DB";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //             'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $responseData = curl_exec($ch);
        // if(curl_errno($ch)) {
        //     return curl_error($ch);
        // }
        // curl_close($ch);
        // $responseData = json_decode($responseData, true);
        // // dd($responseData);
        // $checkoutId = $responseData['id'];


        // return view('front.buy_course', compact('course', 'checkoutId'));
        return view('front.buy_course', compact('course'));
    }

    public function buy_course_thanks (Request $request, $id)
    {

        $token = request()->token;
        // $token = $request->token;

// Set the secret key
$secretKey = 'sk_test_bd926df9-453b-4096-9a80-3ac332645404';

// Initialize the Checkout API in Sandbox mode. Use new CheckoutApi($liveSecretKey, false); for production
$checkout = new CheckoutApi($secretKey);


// Create a payment method instance with card details
$method = new TokenSource($token);

// Prepare the payment parameters
$payment = new Payment($method, 'JOD');
$payment->amount = 100 * 100; // = 10.00

// Send the request and retrieve the response
$response = $checkout->payments()->request($payment);

// dd($response->http_code == 201);

if($response->http_code == 201) {
    return [
        'msg' => 'Payment Done',
        'type' => 'alert-success'
    ];
}else {
    return [
        'msg' => 'Payment Faild',
        'type' => 'alert-danger'
    ];
}

        // $course = Course::findOrFail($id);

        // $resourcePath = request()->resourcePath;

        // $url = "https://eu-test.oppwa.com".$resourcePath;
        // $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        //                 'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $responseData = curl_exec($ch);
        // if(curl_errno($ch)) {
        //     return curl_error($ch);
        // }
        // curl_close($ch);

        // $responseData = json_decode($responseData, true);
        // $code = $responseData['result']['code'];

        // $valid = ['000.000.000', '000.000.100', '000.100.105', '000.100.106', '000.100.110', '000.100.111', '000.100.112'];
        // if(in_array($code, $valid)) {
        //     // register course
        //     DB::table('user_courses')->insert([
        //         'user_id' => Auth::id(),
        //         'course_id' => $id
        //     ]);

        //     // SEND Mobile SMS
        //     //$this->sms('0592418889', 'رسالة اخرى');


        //     // Delete * from users where id = 1 or 1 = 1

        //     // DB::statement('INSERT INTO user_courses VALUES (?,?)', [Auth::id(), $id]);

        //     //show success message
        //     return redirect()->route('website.courses_single', $course->slug)->with('msg', 'payemnt success')->with('type', 'success');

        // }else {
        //     //show error message

        //     return redirect()->route('website.courses_single', $course->slug)->with('msg', 'payemnt faild')->with('type', 'danger');

        // }
    }



    public function test_data(Request $request)
    {
        $number = $request->number;

        return ['final' => $number * $number];
    }


    public function my_courses()
    {
        $title = 'My Courses';

        // $courses = Auth::user()->courses()->paginate(6);

        $courses_ids = DB::table('user_courses')->where('user_id', Auth::id())->pluck('course_id')->toArray();
        $courses = Course::whereIn('id', $courses_ids)->paginate(6);

        $route_name = 'course_videos';

        // dd($courses);

        return view('front.courses', compact('title', 'courses', 'route_name'));
    }

    public function course_videos($slug)
    {
        $course = Course::with('videos')->where('slug', $slug)->first();
        // dd($course);
        $user_videos = DB::table('user_videos')->where('user_id', Auth::id())->where('course_id', $course->id)->pluck('video_id')->toArray();
        // dd($user_videos);
        return view('front.course_videos', compact('course', 'user_videos'));

    }

    public function video_single($id)
    {
        $video = Video::with('course')->findOrFail($id);

        return view('front.video_single', compact('video'));
    }

    public function video_watched($id)
    {
        $video = Video::findOrFail($id);

        DB::table('user_videos')->insert([
            'user_id' => Auth::id(),
            'video_id' => $id,
            'course_id' => $video->course_id
        ]);

        $next_video = Video::where('id', '>', $video->id)->where('course_id', $video->course_id)->first();

        return redirect()->route('website.video_single', $next_video->id);
    }

    public function certificate($user_id, $course_id)
    {
        $user = User::findOrFail($user_id);
        $course = Course::findOrFail($course_id);

        $data_for_qr =  "mohamednaji.com witness that candidate " . $user->name ." has been successfully passed the course " . $course->trans_name;

        // dd($user, $course);
        $mpdf = new Mpdf([
            'margin_top' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_bottom' => 0,
            'margin_header' => 0,
            'margin_footer' => 0,
            'orientation' => 'L',
            'default-font' => 'Lato',
        ]);

        $data = view('front.certificates.content', compact('user', 'course', 'data_for_qr'))->render();

        $mpdf->WriteHTML($data);

        $file_name = rand().'-'.Str::slug($user->name).'.pdf';
        $path = public_path('uploads/certificates/').$file_name;

        $mpdf->Output($path, 'F');

        return view('front.preview_certificate', compact('file_name'));
    }
}
