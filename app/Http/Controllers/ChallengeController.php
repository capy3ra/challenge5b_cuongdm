<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $result = $request->input('id_challenge');
        
        dd($result);
    }
}
