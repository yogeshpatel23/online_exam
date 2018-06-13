<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Image;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin',["only" => ['index','show']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users',$users);
    }

    /**
     * Assgin role the User
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignRole(Request $request, $id)
    {
        $user = User::find($id);
        $user->roles()->detach();
        if($request['isUser'])
        {
            $user->roles()->attach(Role::where('name','User')->first());
        }
        if($request['isAdmin'])
        {
            $user->roles()->attach(Role::where('name','Admin')->first());
        }
        return redirect()->back();
    }

     /**
     * Show the User page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprofile($id)
    {
        if (Auth::user()->id == $id) {
            $user = User::find($id);
            return view('user.profile')->with('user',$user);
        }
        abort(404,'Eroor kyo');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'dob'           => 'nullable|date',
            //'gender'        => 'male',
            'mobile'        => 'nullable|digits:10',
            'city'          => 'max:255',
            'edu'           => 'max:255',
            'prof'          => 'max:255',
            'gpid'          => 'max:255',
            'fbid'          => 'max:255',
            'twid'          => 'max:255',
        ]);

        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->mobile = $request->input('mobile');
        $user->city = $request->input('city');
        $user->edu = $request->input('edu');
        $user->prof = $request->input('prof');
        $user->gpid = $request->input('gpid');
        $user->fbid = $request->input('fbid');
        $user->twid = $request->input('twid');

        $user->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request, $id)
    {
        $this->validate($request,[
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->hasFile('profile_img')) {
            $avatar = $request->file('profile_img');
            $file_name = Auth::user()->id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/'. $file_name));
            
            $user = User::find($id);
            $user->picture = $file_name;

            $user->save();
        }
            
        return redirect()->back();
    }


}
