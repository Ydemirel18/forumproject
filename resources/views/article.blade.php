@extends('layouts.app')
@section('js')

@endsection
@section('css')

@endsection
@section('content')
 <!-- Page content-->
 <div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            @foreach ($articles as $item)
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $item->content_title }}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">
                    {{ $item->updated_at }} tarihinde {{ $item->user->name }} tarafından paylaşıldı</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                </header>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4" style="overflow-wrap: break-word;">{{ $item->content }}</p>
                   </section>
            </article>
            @endforeach
             <!-- Comments section-->
            @if (count($comments)>0)
            <section class="mb-5">
                <div>
                    <b>YAZI İLE İLGİLİ YORUMLAR</b>
                    <div class="card-body" style="overflow-wrap: break-word;">
                        @foreach ($comments as $comment)
                        <!-- Single comment-->
                        <div class="d-flex" >
                            <div class="flex-shrink-0">
                                <img class="rounded-circle" src={{asset('img/account.png')}} alt="..." />
                            </div>
                            <div class="col-lg-10">
                            <div class="ms-3" >
                                <b>{{$comment->user->name}}</b><br>
                                <p style="padding-right: 10%;">
                                    {{$comment->comment}} 
                                </p>
                            </div>
                            </div>
                         </div>
                        @endforeach
                        <!-- Comment with nested comments-->
                    </div>
                </div>
            </section>
            @endif
            @auth
            <!-- Comment form-->
            <form action="{{url('/comment/create')}}" method="get" class="mb-4">
                <textarea class="form-control"  name="articlecomment" rows="3" placeholder="Tartışmaya katıl ve bir yorum bırak!" required></textarea>
                <input type="hidden"  name="articleid" value="{{$item->id}}"><br>
                <button type="submit" class="btn btn-success">Yorum Gönder</button>
            </form>
            @endauth
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Ara</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Arama Terimi Giriniz..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Ara!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Kategoriler</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            @if (count($categories)>0)
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $category)
                                <li><a href="category/{{$category->id}}">{{$category->category}}</a></li>
                                @endforeach
                             </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
