<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChallengeController extends Controller
{
    public function index(){
        $challenges = Challenge::all();
        return view('challenge.index', [
            'challenges' => $challenges,
        ]);
    }

    public function create(){
        return view('challenge.create');
    }

    public function store(Request $request){
        if($request->hasFile('path_file')){
            $nameFile = $request->file('path_file')->getClientOriginalName();
            $extFile = $request->file('path_file')->getClientOriginalExtension();
            $path_file = $request->file('path_file')->storeAs(
                'challenges',
                $nameFile,
            );
            $challenge = Challenge::create([
                'title' => $request->input('title'),
                'hint' => $request->input('hint'),
                'path' => $path_file,
            ]);
            $challenge->save();
            return redirect()->route('challenge.index')->with('success', 'Upload new challenge completed');
        }else{
            return redirect(route('challenge.create'))->with('error', 'Nothing file been selected !! ');
        }
    }

    public function answer($id){
        $challenge =Challenge::find($id);
        return view('challenge.answer')->with('challenge', $challenge);
    }

    public function submit(Request $request){
        $ans = $request->input('ans');
        $id_challenge = $request->input('id_challenge');
        $challenge = Challenge::find($id_challenge);
        $result = $challenge->path;
        $path = storage_path('app/'.$result);
        $pos1 = strpos($result, '/');
        $pos2 = strpos($result, '.');
        $result = substr($result, $pos1 + 1, $pos2 - $pos1 - 1);
        if(strtolower($ans) == strtolower($result)){
            $indicate = file_get_contents($path, true);
            return redirect(route('challenge.answer', $id_challenge))->with(
                array(
                    'success' => "Correct",
                    'indicate' => $indicate,
                )
            );
        }else{
            return redirect(route('challenge.answer', $id_challenge))->with('error', 'Incorrect !!');
        }
    }
}
