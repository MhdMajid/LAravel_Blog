@foreach ($data as $item)
<article class="col-12 col-md-6 tm-post">
    <hr class="tm-hr-primary">
    <a href="{{route('post.show',$item->slug)}}" class="effect-lily tm-post-link tm-pt-60">
        <div class="tm-post-link-inner">
            <img src="{{asset($item->photo)}}" alt="Image" class="img-fluid">                            
        </div>
        <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$item->title}}</h2>
    </a>                    
    <p class="tm-pt-30">
        {{$item->content}}
    </p>
    <div class="d-flex justify-content-between tm-pt-45">
        <span class="tm-color-primary">{{$item->title}}</span>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
       
        <span>{{$item->created_at->diffForhumans()}}</span>
    </div>
    <div class="d-flex justify-content-between">
       
        <span>{{$item->user->name}}</span>
    </div>
    <div class="d-flex m-3 ">
       
        @if ($item->user_id === Auth::id())
            <p class=" m-3 "><a class="btn btn-info" href="{{route('post.edit',$item->id)}}">Edit</a></p>
            <br>
           <p class=" m-3 "> <a class="btn btn-info" href="{{route('post.destroy',$item->id)}}">Delelte</a></p>
            @endif
    </div>
</article>
@endforeach
