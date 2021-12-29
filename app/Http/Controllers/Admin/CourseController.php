<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        $type = 'index';

        return view('admin.courses.index', compact('courses', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $course = new Course();

        return view('admin.courses.create', compact('categories', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'en_content' => 'required|min:100',
            'ar_content' => 'required|min:100',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
            'discount' => 'nullable|numeric',
            'category_id' => 'required'
        ]);


        // upload file
        $imgname = time().rand().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $imgname);


        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        $excerpt = [
            'en' => $request->en_excerpt,
            'ar' => $request->ar_excerpt,
        ];

        $content = [
            'en' => $request->en_content,
            'ar' => $request->ar_content,
        ];

        Course::create([
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'slug' => Str::slug($request->name_en),
            'excerpt' => json_encode($excerpt, JSON_UNESCAPED_UNICODE),
            'content' => json_encode($content, JSON_UNESCAPED_UNICODE),
            'image' => $imgname,
            'discount' => $request->discount,
            'category_id' => $request->category_id
        ]);

        return redirect()
                ->route('admin.courses.index')
                ->with('msg', 'Course added')
                ->with('type', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::select('id', 'name')->get();

        return view('admin.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'en_content' => 'required|min:100',
            'ar_content' => 'required|min:100',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg',
            'discount' => 'nullable|numeric',
            'category_id' => 'required'
        ]);

        $course = Course::findOrFail($id);

        $imgname = $course->image;
        if($request->hasFile('image')) {
            // upload file
            $imgname = time().rand().$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $imgname);
        }

        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        $excerpt = [
            'en' => $request->en_excerpt,
            'ar' => $request->ar_excerpt,
        ];

        $content = [
            'en' => $request->en_content,
            'ar' => $request->ar_content,
        ];

        $course->update([
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'excerpt' => json_encode($excerpt, JSON_UNESCAPED_UNICODE),
            'content' => json_encode($content, JSON_UNESCAPED_UNICODE),
            'image' => $imgname,
            'discount' => $request->discount,
            'category_id' => $request->category_id
        ]);

        return redirect()
                ->route('admin.courses.index')
                ->with('msg', 'Course updated')
                ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()
                ->route('admin.courses.index')
                ->with('msg', 'Course moved to trash successfully')
                ->with('type', 'info');
    }

    /**
     * Display a listing of trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $courses = Course::onlyTrashed()->latest()->get();
        $type = 'trash';
        return view('admin.courses.index', compact('courses', 'type'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Course::withTrashed()->find($id)->restore();
        return redirect()
                ->route('admin.courses.index')
                ->with('msg', 'Course untrashed successfully')
                ->with('type', 'success');
    }

    /**
     * forceDelete the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        Course::withTrashed()->find($id)->forceDelete();
        return redirect()
                ->route('admin.courses.index')
                ->with('msg', 'Course detelet permanintley successfully')
                ->with('type', 'danger');
    }
}
