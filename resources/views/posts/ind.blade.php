@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <main class="tm-main">
            {{-- <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>         
            -------------------------------------
            --}}
            <div class="row tm-row">
                {{-- post --}}
                @foreach ($post as $item)
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
                {{-- end post --}}
            </div>
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
                    Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">TemplateMo</a>
                </div>
                <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                    Copyright 2020 Xtra Blog Company Co. Ltd.
                </div>
            </footer>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
@endsection
