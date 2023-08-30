<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreBookRequest;
use App\Models\BookRequest;
use Illuminate\Http\Request;
use File;


class BookRequestController extends Controller
{
    public function index(Request $request)
    {
        $bookrequestinquiries = BookRequest::when($request->start_date, function ($query) use ($request) {
            $query->whereDate('created_at',  '>=', $request->start_date);
        })->when($request->end_date, function ($query) use ($request) {
            $query->whereDate('created_at',  '<=', $request->end_date);
        })->latest()->paginate(10);

        $searchParams =  $_GET ?? '';
        return view('admin.bookrequest.index', compact('bookrequestinquiries', 'searchParams'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ]);

        $input = $request->all();
        $input['attached_file'] = $this->fileUpload($request, 'attached_file');
        BookRequest::create($input);
        return redirect()->route('bookrequest')->with('message', 'Thank you, your enquiry has been Submitted Successfully');
    }

    public function destroy(BookRequest $bookrequest)
    {
        $this->removeFile($bookrequest->attached_file);
        $bookrequest->delete();
        return redirect()->route('admin.bookrequestinquiry.index')->with('message', 'Delete Successfully');
    }

    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/images/bookrequest';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/bookrequest/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
