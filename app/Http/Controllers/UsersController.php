<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUsersProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){
        return view('users.index')->with('users', User::all());
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success', 'User role changed to admin successfully!');

        return redirect()->back();
    }
    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }

    public function usersProfile(UpdateUsersProfileRequest $request){
//        dd($request->all());
        $user = auth()->user();
//        dd($user);
        $user->update([
           'name'=> $request->name,
            'about'=> $request->about,
        ]);
        session()->flash('success', 'User profile update successfully!');

        return redirect()->back();
    }
}
