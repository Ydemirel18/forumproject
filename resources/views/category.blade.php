@extends('layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="row">
   
        <!-- Blog entries-->
        <div class="col-lg-8">
            @if(count($article_categories) > 0)
            <p><h3>KATEGORİYE AİT YAZILAR AŞAĞIDA LİSTELENMİŞTİR</h3></p>
            @else
            <p><h3>KATEGORİYE AİT YAZI BULUNAMAMIŞTIR</h3></p>
            @endif
        @foreach ($article_categories as $article)
            <!-- Featured blog post-->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="small text-muted">{{$article->name}} - {{$article->articles->updated_at}}</div>
                    <h2 class="card-title"> {{$article->articles->content_title}}</h2>
                    <p class="card-text"> {{$article->articles->content_description}}</p>
                    <a href="{{url('article/'.$article->articles->id)}}"> Devamını oku! </a>
                </div>
            </div>
        @endforeach
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
                                <a href="{{$category->id}}">
                                    <li>
                                       {{$category->category}}<br>
                                    </li>
                                </a>
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
