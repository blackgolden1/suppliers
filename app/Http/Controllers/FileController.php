<?php

namespace App\Http\Controllers;

use App\Models\Document;
use http\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class FileController extends Controller
{
    public function store(Request $request):RedirectResponse
    {
//        $this->validate($request,[
//            'file' => 'required|mimes:pdf|max:2048', // Example validation rules
//        ]);

        $file = $request->file('file');
        $fileName = 'bla';
        if(!empty($this->file)){
        $filePath = $file->storeAs('uploads', $fileName);
        Document::create([
            'name' => $fileName,
            'url' => $filePath,
        ]);}
        else{
           alert('no archivo');
        }
        return redirect()->back()->with('message', 'File uploaded successfully.');
    }


}
