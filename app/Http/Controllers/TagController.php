<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {   
        $tag= Tag::all();
        return view('tags.index',compact('tag'));
    }
    public function create()
    {
        
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $tag = Tag::create([
            'name'=>$request->name
        ]);
        return  redirect()->back();
    }
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags/edit',compact('tag'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,['name'=>'required']);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        return redirect()->back();
    }

    public function destroy( $id)
    {
      $tag = Tag::find($id);
      $tag->destroy($id);
      return redirect()->back();

    }
}
