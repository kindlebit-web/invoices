<?php
namespace App\Http\Controllers;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
 
 public function index()
 {
     //return view('settings.index');
 }

  public function update(ProfileRequest $request)
    {
    	$user = $request->user();

    	$user->name = $request->name;
    	$user->email = $request->email;
        $user->save();

    	$password = $request->new_password;
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials) && $password) {
                 $user->password = Hash::make($password);
			     $user->save();
        }

        return redirect()->back()->with('status', 'Profile Updated Successfully!');
    }
}
