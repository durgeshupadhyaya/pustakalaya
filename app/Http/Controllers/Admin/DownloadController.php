<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDownloadRequest;
use App\Http\Requests\Admin\UpdateDownloadRequest;
use App\Models\Download;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = Download::latest()->paginate(10);
        return view('admin.download.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.download.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDownloadRequest $request)
    {
        $input = $request->all();
        $input['file'] = $this->fileUpload($request, 'file');
        Download::create($input);

        return redirect()->route('admin.downloads.index')->with('message', 'Created Successfully');
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
    public function edit(Download $download)
    {
        return view('admin.download.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDownloadRequest $request, Download $download)
    {
        $old_file = $download->file;
        $input = $request->all();
        $file = $this->fileUpload($request, 'file');

        if ($file) {
            $this->removeFile($old_file);
            $input['file'] = $file;
        } else {
            unset($input['file']);
        }

        $download->update($input);
        return redirect()->route('admin.downloads.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        $this->removeFile($download->file);
        $download->delete();
        return redirect()->route('admin.downloads.index')->with('message', 'Delete Successfully');
    }

    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/images/download';
            $imageName = date('YmdHis') . $name . "-" . Str::slug($image->getClientOriginalName()) . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/download/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
