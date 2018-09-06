<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;
use Illuminate\Support\Facades\Storage;

class BlogApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user')->get();
        
        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Data get successfully',
            'data' => $blogs
        ]);
    }

    public function create(Request $request)
    {
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = $request->user_id;

        $image_name = $this->savePhoto($request->image);
        $blog->image = $image_name;

        $blog->save();

        return response()->json([
            'code' => 201,
            'status' => 'CREATED',
            'message' => 'Data create successfully'
        ]);
    }

    private static function savePhoto($image)
    {
        $pic_name = "no_pic.jpg"; 
        if (!empty($image)) {
            $pic_name = str_replace([" ", "."], ["-", ""], microtime(true)).'-'.str_replace(" ", "-", $image->getClientOriginalName());
            $path = $image->storeAs(
                'blog', $pic_name
            );
            Storage::url($path);
        }
        return $pic_name;
    }

}
