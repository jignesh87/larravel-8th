<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function uploadAndStore(Request $request)
    {

    	$request->validate([
            'file' => 'required|mimes:svg,pdf,xlx,csv|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);

        $document = new Document;
        $document->document_name = $fileName;
        $document->user_id = 1;
   		$document->save();
        // return back()
        //     ->with('success','You have successfully upload file.')
        //     ->with('file',$fileName);


 //   	echo "<pre>";print_r($_FILES);die;
        // $validatedData = $request->validate([
        //  'file' => 'required|max:2048',
        //  ]);
 
        // $name = $request->file('file')->getClientOriginalName();
 
        // $path = $request->file('file')->store('public/uploads');
 
        // $save = new Document;
        // $save->document_name = $name;
        // $save->user_id = 1;
 
       // return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
 
    }

    public function getDocuments(Request $request)
    {   //echo "<pre>";print_r($request->user_id);die;
    	$documents = Document::where('user_id',$request->user_id)->get();
        return response()->json(["status" => "success", "message" => "Success!", "data" => $documents]);
    }
}
