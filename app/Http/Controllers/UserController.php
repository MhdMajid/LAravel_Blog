<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $user = User::all();
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required','string','max:255'],
            'email'=>['required','string','max:255','email','unique:users'],
            'password'=>['required','string','min:8','confirmed'],
            'state'=>'required',
            'role'=>'required',
        ]);
        // dd($request);

        $user =User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'state' =>$request->state,
            'role'=>$request->role,
        ]);
        // dd($request);
        $profile = Profile::create([
            'user_id' =>$user->id,
            'province' =>'damac',
            'gender'=>'male',
            'bio'=>'helo from Profile',
            'facebook'=>'https://www.facebook.com'
        ]);

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $user = User::find($id);
       $user->profile->delete($id);
       $user->delete($id);
       return redirect()->route('users');

    }
}
