<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
        $this->middleware('auth');
    }


    
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
         if ($user->profile == null) {
            $profile = Profile::create([
                'user_id' =>$id,
                'province' =>'damac',
                'gender'=>'male',
                'bio'=>'helo from Profile',
                'facebook'=>'https://www.facebook.com'
            ]);

         }
        return view('users.profile')
        ->with('user',$user);
    }

 

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'province' => 'required',
            'gender'    => 'required',
            'bio'	   => 'required',
        ]);
        $user = Auth::user();
        $user->name = $request->name ;
        $user->profile->province = $request->province ;
        $user->profile->gender = $request->gender ;
        $user->profile->bio = $request->bio ;
        $user->save();
        $user->profile->save();

    //    dd($request->all());
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

     return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
