<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $user = User::find(1);

        // return $user->createToken('test')->plainTextToken;

        // return md5(123);
        // $data = Http::get('https://jsonplaceholder.typicode.com/posts');

        // $data = $data->body();

        // dd(json_decode($data));

        // if(request()->has('token')) {
        //     $token = request()->token;

        //     $user = User::where('token', $token)->exists();
        //     if($user) {
        //         return [
        //             'message' => 'Data come successfully',
        //             'status' => 200,
        //             'data' => Category::all()
        //         ];
        //     }else {
        //         return [
        //             'message' => 'Token not valid',
        //             'status' => 301,
        //             'data' => ''
        //         ];
        //     }

        // }else {
        //     return [
        //         'message' => 'Require Token',
        //         'status' => 301,
        //         'data' => null
        //     ];
        // }

        return [
            'message' => 'Data come successfully',
            'status' => 200,
            'data' => Category::all()
        ];

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name_en' => 'required', 'name_ar' => 'required']);

        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar
        ];

        $data = [
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'slug' => Str::slug( $request->name_en),
            'parent_id' => $request->parent_id
        ];

        $category = Category::create($data);

        if($category) {
            return response()->json([
                'message' => 'category added',
                'status' => 201,
                'data' => $category
            ],  201);
        }else {
            return [
                'message' => 'Error',
                'status' => 500
            ];
        }


        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if($category) {
            return response()->json([
                'message' => 'category exist',
                'status' => 200,
                'data' => $category
            ],  200);
        }else {
            return response()->json([
                'message' => 'category not found',
                'status' => 404,
                'data' => ''
            ],  404);
        }
        // return Category::findOrFail($id);
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
        $request->validate(['name_en' => 'required', 'name_ar' => 'required']);

        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar
        ];

        $data = [
            'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
            'slug' => Str::slug( $request->name_en),
            'parent_id' => $request->parent_id
        ];

        return Category::findOrFail($id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Category::findOrFail($id)->delete();
    }
}
