<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {

        $fileuploadsCollection = FileUpload::latest();

        if (request('search')) {
            $fileuploadsCollection = $fileuploadsCollection
                ->where('subject', 'like', '%' . request('search') . '%')
                ->orWhere('file_type', 'like', '%' . request('search') . '%');
        }

        $fileuploads = $fileuploadsCollection->paginate(10);

        return view('backend.fileuploads.index', [
            'fileuploads' => $fileuploads
        ]);
    }

    public function create()
    {
        // $this->authorize('create-fileupload');

        return view('backend.fileuploads.create');
    }

    public function store(Request $request)
    {
        try {
            FileUpload::create([
                'file_type' => $request->file_type,
                'pdf' => $this->uploadpdf(request()->file('pdf')),
                'subject' => $request->subject,
            ]);

            return redirect()->route('fileupload.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(FileUpload $fileupload)
    {
        return view('backend.fileuploads.show', [
            // 'fileupload' => $fileupload,
            'fileupload_show' => $fileupload,
        ]);
        
    }

    public function edit(FileUpload $fileupload)
    {
        return view('backend.fileuploads.edit', [
            // 'fileupload'=>$fileupload
            'fileupload_edit' => $fileupload,
        ]);
    }

    public function update(Request $request, FileUpload $fileupload)
    {
        try {
            $requestData = [
                'file_type' => $request->file_type,
            ];

            if ($request->hasFile('pdf')) {
                $pdf = $request->file('pdf');
                $name = time() . '.' . $pdf->getClientOriginalExtension();
                $destinationPath = storage_path('/app/public/files/');
                $pdf->move($destinationPath, $name);
                $fileupload->pdf = $name;
            }

            $fileupload->update($requestData);

            return redirect()->route('fileupload.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(FileUpload $fileupload)
    {
        try {
            $fileupload->delete();
            return redirect()->route('fileupload.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    // Softdelete
    public function trash()
    {
        $fileuploads = FileUpload::onlyTrashed()->get();

        return view('backend.fileuploads.trashed', [
            'fileuploads' => $fileuploads
        ]);
    }

    public function restore($id)
    {
        $fileupload = FileUpload::onlyTrashed()->findOrFail($id);
        $fileupload->restore();
        return redirect()->route('fileuploads.trashed')->withMessage('Successfully Restored!');
    }

    public function delete($id)
    {
        $fileupload = FileUpload::onlyTrashed()->findOrFail($id);
        unlink(public_path('storage/files/' . $fileupload->pdf));
        $fileupload->forceDelete();
        return redirect()->route('fileuploads.trashed')->withMessage('Successfully Deleted Permanently!');
    }

    public function uploadpdf($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = storage_path('/app/public/files/');
        $file->move($destinationPath, $fileName);
        return $fileName;
    }
}
