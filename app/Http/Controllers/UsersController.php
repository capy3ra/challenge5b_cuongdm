<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller 
{
    //Show
    public function index(){
        $users = User::all();
        return view('user.index', [
            'users' => $users,
        ]);
    }

    //Create new user
    public function create(){
        return view('user.create');
    }

    //Store
    public function store(Request $request){
        $user = User::create([
            'full_name' => $request->input('full_name'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'isTeacher' => $request->input('isTeacher'),
        ]);
        $user->save();
        return redirect(route('userList.index'))->with('success', 'Create completed');
    }

    //Show
    public function detail($id)
    {
        return view('user.detail', [
            'curuser' => User::findOrFail($id)
        ]);
    }


    //Edit
    public function edit($id){
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
    }

    //Update
    public function update(Request $req, $id){
        $user = User::where('id', $id)->update([
            'email' => $req->input('email'),
            'phone_number' => $req->input('phone-number'),
        ]);
        return redirect(route('userList.index'))->with('success', 'Update completed');
    }

    //Delete
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect(route('userList.index'))->with('success', 'Delete completed');
    }
}
