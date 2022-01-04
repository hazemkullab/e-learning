<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->get();
        $type = 'index';

        return view('admin.videos.index', compact('videos', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::select('id', 'name')->get();
        $video = new Video();
        return view('admin.videos.create', compact('courses', 'video'));
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
            'path' => 'required',
            'course_id' => 'required|exists:courses,id'
        ]);

        // upload file
        $path = time().rand().$request->file('path')->getClientOriginalName();
        $request->file('path')->move(public_path('uploads'), $path);


        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        Video::create([
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'path' => $path,
            'type' => $request->type,
            'course_id' => $request->course_id
        ]);

        return redirect()
                ->route('admin.videos.index')
                ->with('msg', 'Video added')
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
        $courses = Course::select('id', 'name')->get();
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('courses', 'video'));
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
            'path' => 'nullable',
            'course_id' => 'required|exists:courses,id'
        ]);

        $video = Video::findOrFail($id);
        $path = $video->path;
        if($request->hasFile('path')) {
            // upload file
            $path = time().rand().$request->file('path')->getClientOriginalName();
            $request->file('path')->move(public_path('uploads'), $path);
        }


        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ];

        $video->update([
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'path' => $path,
            'type' => $request->type,
            'course_id' => $request->course_id
        ]);

        return redirect()
                ->route('admin.videos.index')
                ->with('msg', 'Video updated')
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
        Video::destroy($id);
        return redirect()
                ->route('admin.videos.index')
                ->with('msg', 'Video moved to trash successfully')
                ->with('type', 'info');
    }

    /**
     * Display a listing of trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $videos = Video::onlyTrashed()->latest()->get();
        $type = 'trash';
        return view('admin.videos.index', compact('videos', 'type'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Video::withTrashed()->find($id)->restore();
        return redirect()
                ->route('admin.videos.index')
                ->with('msg', 'Video untrashed successfully')
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
        Video::withTrashed()->find($id)->forceDelete();
        return redirect()
                ->route('admin.videos.index')
                ->with('msg', 'Video detelet permanintley successfully')
                ->with('type', 'danger');
    }
}
