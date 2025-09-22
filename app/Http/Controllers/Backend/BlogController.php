<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Str;

class BlogController extends Controller
{
    public function add_blog(Request $request)
    {
        return view('backend.blog.add');
    }

    public function admin_add_blog(Request $request)
    {

        $insertRecord = new Blog;
        $insertRecord->title = trim($request->title);
        $insertRecord->description = trim($request->description);

        if (!empty($request->file('image'))) {

            $file       =   $request->file('image');
            $randomStr  =   Str::random(30);
            $filename   =   $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('blog/', $filename);
            $insertRecord->image = $filename;
        }
        $insertRecord->save();

        return redirect('admin/blog')->with('success', "Blog Added Successfully");
    }
}
