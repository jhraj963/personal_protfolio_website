<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\Models\Protfolio;

class PortfolioController extends Controller
{
    public function portfolio_add(Request $request)
    {

        return view('backend.portfolio.add');
    }

    public function portfolio_post(Request $request)
    {
        // dd($request->all());
        $insertRecord = new Protfolio;
        $insertRecord->title = trim($request->title);

        if (!empty($request->file('image'))) {

            $file       =   $request->file('image');
            $randomStr  =   Str::random(30);
            $filename   =   $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('portfolio/', $filename);
            $insertRecord->image = $filename;
        }
        $insertRecord->save();
        return redirect('admin/portfolio')->with('success', "Portfolio Page Successfully Add");
    }

    //Edit

    public function portfolio_edit($id, Request $request)
    {
        $data['getrecord'] = Protfolio::find($id);
        return view('backend.portfolio.edit', $data);
    }

    // Update

    public function portfolio_update($id, Request $request)
    {
        $updateRecord = Protfolio::find($id);

        $updateRecord->title = trim($request->title);
        if(!empty($request->file('image')))
        {
            if(!empty($updateRecord->image) && file_exists('portfolio/'. $updateRecord->image))
            {
                unlink('portfolio/' . $updateRecord->image);
            }
            $file       =   $request->file('image');
            $randomStr  =   Str::random(30);
            $filename   =   $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('portfolio/', $filename);
            $updateRecord->image = $filename;
        }
        $updateRecord->save();
        return redirect('admin/portfolio')->with('success', "Portfolio Successfully Updated");
    }

    // Delete

    public function portfolio_delete($id, Request $request)
    {
        $deleteRecord = Protfolio::find($id);

        if (!empty($deleteRecord->image) && file_exists('portfolio/' . $deleteRecord->image)) {
            unlink('portfolio/' . $deleteRecord->image);
        }

        $deleteRecord->delete();

        return redirect('admin/portfolio')->with('error', "Portfolio Successfully Deleted!");
    }
}
