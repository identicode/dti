<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use Auth;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
    	return view('user.profile');
    }

    public function info(Request $request)
    {
    	$update = User::find(Auth::user()->id);
    	$update->name = $request->name;
    	$update->save();

    	return redirect()->back()->with('success', 'Profile has been updated.');
    }

    public function username(Request $request)
    {
    	$check = User::where('username', $request->username)->where('id', '!=', Auth::user()->id)->get()->count();
    	
    	if($check != 0){
    		return redirect()->back()->with('error', 'Username is taken.');
    	}

    	$update = User::find(Auth::user()->id);
    	$update->username = $request->username;
    	$update->save();

    	return redirect()->back()->with('success', 'Username has been updated.');
    }

    public function password(Request $request)
    {
    	if($request->pass != $request->cpass){
    		return redirect()->back()->withInput()->with('error', 'Password mismatch');
    	}

    	if(Hash::check($request->old, Auth::user()->password) == false){
    		return redirect()->back()->withInput()->with('error', 'Incorrect password.');
    	}

    	$update = User::find(Auth::user()->id);
    	$update->password = Hash::make($request->pass);
    	$update->save();

    	return redirect()->back()->with('success', 'Password has been updated.');
    }
}
