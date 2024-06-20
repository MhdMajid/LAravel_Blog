@extends('layouts.app')
@section('content')

<div class="container">
    @if (count($errors) > 0)
    @foreach ($errors as $item)
        <div class="alert alert-primary" role="alert">
            <strong>{{$item}}</strong>
        </div>
    @endforeach
    @endif
    <div class="center">
        <a href="{{route('post.create')}}" class="btn btn-dark">Create</a>
        <a href="{{route('posts.trashed')}}" class="btn btn-success">Trashed</a>
        <a href="{{route('tags')}}" class="btn btn-info">Tags</a>
    </div>
    
    <br>
    <br>
    <br>
        @if (count($post)>0)        
            <div class="container-fluid">
                <main class="">
                    <!-- Search form -->
                    <div class="row tm-row">
                        <div class="col-12">
                            <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                                <input class="form-control tm-search-input" id="searchbyjobname" type="text" placeholder="Search..." aria-label="Search">
                                <button class="tm-search-button" type="submit">
                                    <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                                </button>                                
                            </form>
                        </div>                
                    </div>         
                    {{-- ------------------------------------- --}}
                   
                    <div class="row tm-row">
                        {{-- post --}}
                        {{-- <div id="ajax_search_result"> --}}
                            @foreach ($post as $item)
                            <article class="col-12 col-md-6 tm-post">
                                <hr class="tm-hr-primary">
                                <a href="{{route('post.show',$item->slug)}}" class="effect-lily tm-post-link tm-pt-60">
                                    <div class="tm-post-link-inner">
                                        <img src="{{asset($item->photo)}}" alt="Image"   class="img-fluid">                            
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
    
                        {{-- </div> --}}
                        {{-- end post --}}
                    </div>
                    {{-- **************************** --}}
                    <div class="bo">
                        <button class="order"><span class="default">Complete Order</span><span class="success">Order Placed
                            <svg viewbox="0 0 12 10">
                              <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </svg></span>
                          <div class="box"></div>
                          <div class="truck">
                            <div class="back"></div>
                            <div class="front">
                              <div class="window"></div>
                            </div>
                            <div class="light top"></div>
                            <div class="light bottom"></div>
                          </div>
                          <div class="lines"></div>
                          <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
                          <script src="main.js"></script>
                        
                    </div>
                    {{--*****************************  --}}
                    <div class="row tm-row tm-mt-100 tm-mb-75">
                        <div class="tm-prev-next-wrapper">
                            <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
                            <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Next</a>
                        </div>
                        <div class="tm-paging-wrapper">
                            <span class="d-inline-block mr-3">Page</span>
                            <nav class="tm-paging-nav d-inline-block">
                                <ul>
                                    <li class="tm-paging-item active">
                                        <a href="#" class="mb-2 tm-btn tm-paging-link">1</a>
                                    </li>
                                    <li class="tm-paging-item">
                                        <a href="#" class="mb-2 tm-btn tm-paging-link">2</a>
                                    </li>
                                    <li class="tm-paging-item">
                                        <a href="#" class="mb-2 tm-btn tm-paging-link">3</a>
                                    </li>
                                    <li class="tm-paging-item">
                                        <a href="#" class="mb-2 tm-btn tm-paging-link">4</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>                
                    </div>            
                    <footer class="row tm-row">
                        <hr class="col-12">
                        <div class="col-md-6 col-12 tm-color-gray">
                        </div>
                        <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                            Copyright 2024 
                        </div>
                    </footer>
                </main>
            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/templatemo-script.js"></script>
            
            
        @else
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">no post to show</h4>
              
              <p class="mb-0"></p>
            </div>
        @endif
</div>
    
@endsection

{{-- @section('script')
<script>
$(document).ready(function(){

    $(document).on('input', '#searchbyjobname', function(){
        // alert();
        var searchbyjobname = $(this).val();
        jQuery.ajax({
            url:'{{route('ajax_search_job')}}',
            type: 'post',
            datatype:'html',
            cache:false,
            data:{searchbyjobname:searchbyjobname,'_token':{{csrf_token()}}},
            success:function(data){
                $('#ajax_search_result').html(data);
            },
            error:function(){

            }

        });
    });


});

</script>
    
@endsection --}}