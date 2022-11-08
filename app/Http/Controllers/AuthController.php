<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function checkLogin(Request $request){
        // dd(Hash::make($request->password));
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->route('index');
        }
        return redirect()->route('auth.login')->with('error', 'Username or password is wrong!!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login')->with('success', 'Logout Success');
    }

    public function profile(){
        return view('user.profile');
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        if($request->hasFile('avatar')){
            $nameFile = $request->file('avatar')->getClientOriginalName();
            $extFile = $request->file('avatar')->getClientOriginalExtension();
            if($extFile != "jpg" && $extFile != "gif" && $extFile != "png"){
                return redirect()->route('profile.index')->with('error', 'This file is not an image !!');
            }
            $avatar_path = $request->file('avatar')->storeAs(
                'avatars',
                Str::random(10)."_".$nameFile,
                'public',
            );
            
            $data = [
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone-number'),
                'avatar' => $avatar_path,
            ];
            $user->update($data);
            return redirect()->route('profile.index')->with('success', 'Update data and change avatar successfully');
        }
        else {
            $data = [
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone-number'),
            ];
            $user->update($data);
            return redirect()->route('profile.index')->with('success', 'Update Cuccessful');
        }
    }

    public function changePassword(){
        return view('user.changePwd');
    }

    public function handleChangePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    
}
