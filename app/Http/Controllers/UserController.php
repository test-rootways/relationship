<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\User;
use App\Models\UserHasHobby;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        $hobbies = Hobby::get();
        return view('create',compact('hobbies'));
    }
    public function edit($id)
    {
        $hobbies = Hobby::get();
        $user = User::where('id',$id)->first();
        $user_hobbies = $user->hobby;
        return view('edit',compact('hobbies','user','user_hobbies'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required|unique:users,username',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users,email',
            'age'=>'required|numeric',
            'profile_picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->profile_picture != null) {
            $profile_picture = $request->profile_picture;
            $profile_picture = $request->profile_picture->getClientOriginalName();
            $request->profile_picture->move('profile_picture', $profile_picture);
            $user_profile_picture =  $request->profile_picture = $profile_picture;
        }
        $user = User::create([
            'username'=>$request->username,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'age'=>$request->age,
            'profile_picture'=>$user_profile_picture,
        ]);
        // dd($request->hobbies);
        if ($request->hobbies) {
            foreach ($request->hobbies as $item) {
                $hobby = new UserHasHobby();
                $hobby->hobby_id = $item;
                $hobby->user_id = $user['id'];
                $hobby->save();
            }
        }
        return redirect()->route('index')->with('success','User crated successfully');
    }
    public function destroy(Request $request)
    {
        // dd($request->post());
        User::where('id',$request->id)->delete();
        /* UserHasHobby::where('user_id',$request->id)->delete(); */
        return redirect()->route('index')->with('success','User deleted successfully.');
    }
}
