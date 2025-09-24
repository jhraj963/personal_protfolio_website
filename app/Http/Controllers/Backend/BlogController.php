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

    public function admin_blog_edit($id, Request $request)
    {

        $data['getrecord'] = Blog::find($id);
        return view('backend.blog.edit', $data);
    }

    public function admin_blog_update($id, Request $request)
    {

        $updateRecord = Blog::find($id);

        $updateRecord->title = trim($request->title);
        $updateRecord->description = trim($request->description);
        if (!empty($request->file('image'))) {
            if (!empty($updateRecord->image) && file_exists('blog/' . $updateRecord->image)) {
                unlink('blog/' . $updateRecord->image);
            }
            $file       =   $request->file('image');
            $randomStr  =   Str::random(30);
            $filename   =   $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('blog/', $filename);
            $updateRecord->image = $filename;
        }
        $updateRecord->save();
        return redirect('admin/blog')->with('success', "Blog Successfully Updated");
    }


    // Delete

    public function admin_blog_delete($id, Request $request)
    {
        $deleteRecord = Blog::find($id);

        if (!empty($deleteRecord->image) && file_exists('blog/' . $deleteRecord->image)) {
            unlink('blog/' . $deleteRecord->image);
        }

        $deleteRecord->delete();

        return redirect('admin/blog')->with('error', "Blog Successfully Deleted!");
    }
}
