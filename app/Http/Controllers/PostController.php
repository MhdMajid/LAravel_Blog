<?php
namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\CreatePost;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $post = Post::orderBy('updated_at','DESC')->get();
        // dd($post);
        return view('posts.index',compact('post'));
    }
    // public function ind()
    // {
    //     $post = Post::orderBy('updated_at','DESC')->get();
    //     return view('posts.ind',compact('post'));
    // }
    public function postsTrashed()
    {
        $post = Post::onlyTrashed()->where('user_id',Auth::id())->get();
        return view('posts.trashed',compact('post'));

    }

    public function create()
    {
        $tags = Tag::all();
        if ($tags->count() == 0){
            return redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags',$tags);

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'photo' => 'required|image',
        ]);
        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'photo' => 'uploads/posts/'.$newPhoto,
            'slug' => str_slug($request->title)
        ]);
        $users = User::where('id' , '!=' , auth()->user()->id)->get();
        $user_create = auth()->user()->name;        
        Notification::send($users , new CreatePost($post->id ,$user_create,$post));
        $post->tag()->attach($request->tags);
        return redirect()->back();

    }

    public function show($slug)
    {
        $post = Post::where('slug' , $slug)->first();
        return view('posts.show',compact('post'));    
    }

    public function ajax_search(Request $request)
    {
        if($request->ajax()){
            $searchbyjobname = $request->searchbyjobname;
            $data = Post::where('title','like','%($searchbyjobname)%')->orderby('id','asc')->paginate(1);
            dd($data);
        return view('posts.ajax_search',compact('data'));   
        } 
    }

    public function notification($id)
    {
        $post =DB::table('notifications')->where('id',$id)->first();
        $getID = DB::table('notifications')->where('id',$id)->pluck('id');
        foreach (Auth::user()->unreadNotifications as $item){
            if ($item->id == $post->id){
                $post = $item;}
        }
        DB::table('notifications')->where('id',$getID)->update(['read_at'=>now()]);
        return view('posts.notification')->with(['post'=>$post]);    
    }

    public function allNotification()
    {
        $post = Auth::user()->Notifications;
        return view('posts.allNotification')->with(['post'=>$post]);    
    }

    public function readAllNotification()
    {
        $user = User::find(auth()->user()->id);

        foreach($user->unreadNotifications as $unread){
            $unread->markAsRead();
        }

        return  redirect()->back();    
    }

    public function edit($id)
    {
        $tags = Tag::all();
        $post = Post::where('id',$id)->where('user_id',Auth::id())->first();
        if ($post===null) {
            return redirect()->back();
        }
        return view('posts.edit',compact('post','tags'));    
    }

    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts',$newPhoto);
            $post->photo = 'uploads/posts/'.$newPhoto;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $post->tag()->sync($request->tags);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::where('id',$id)->where('user_id',Auth::id())->first();
        if ($post===null) {
            return redirect()->back();
        }
        $post->delete($id);
        return redirect()->back();
    }
    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }
}
