<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function detail($id){
        $id_assignment = Assignment::find($id)->id;
        $submissions = Submission::where('assignment_id', $id)->get();
        return view('assignment.detail', ['submissions' => $submissions]);
    }

    public function submit($id){
        $assignment = Assignment::find($id);
        return view('assignment.submit', ['assignment' => $assignment]);
    }

    public function handleSubmit(Request $request){
        if($request->hasFile('path_file')){
            $nameFile = $request->file('path_file')->getClientOriginalName();
            $extFile = $request->file('path_file')->getClientOriginalExtension();
            $path_file = $request->file('path_file')->storeAs(
                'submissions',
                Str::random(10)."_".$nameFile,
            );
            $submission = Submission::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => auth()->user()->id,
                'assignment_id' => $request->input('id_assignment'),
                'path' => $path_file,
            ]);
            $submission->save();
            return redirect()->route('classroom.assignment.submit', $request->input('id_assignment'))->with('success', 'Upload submission completed');
        }else{
            return redirect(route('classroom.index'))->with('error', 'Nothing file been selected !! ');
        }
    }

    public function downloadSubmission($id){
        $submission = Submission::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('app/'.$submission->path);
        // dd($submission->path);
        return response()->download($pathToFile);
    }


}
