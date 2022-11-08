<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class AssignmentController extends Controller
{
    public function index(){
        $assignments = Assignment::all();
        return view('assignment.index', [
            'assignments' => $assignments,
        ]);
    }

    public function create(){
        return view('assignment.create');
    }

    public function store(Request $request){
        if($request->hasFile('path_file')){
            $nameFile = $request->file('path_file')->getClientOriginalName();
            $extFile = $request->file('path_file')->getClientOriginalExtension();
            $path_file = $request->file('path_file')->storeAs(
                'assignments',
                Str::random(10)."_".$nameFile,
            );
            $assignment = Assignment::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'path' => $path_file,
            ]);
            $assignment->save();
            return redirect()->route('classroom.index')->with('success', 'Upload new assignment completed');
        }else{
            return redirect(route('classroom.create'))->with('error', 'Nothing file been selected !! ');
        }
    }

    public function downloadAssignment($id){
        $assignment = Assignment::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('app/'.$assignment->path);
        // dd($assignment->path);
        return response()->download($pathToFile);
    }

    // public function detail($id){
    //     $assignment = Assignment::find($id);
    //     return view('assignment.detail')->with('assignment', $assignment);
    // }

}