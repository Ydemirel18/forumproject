@extends('layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
   
        <div class="col-lg-1">
        </div>
        <!-- Blog entries-->
        <div class="col-lg-7">
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
        <div class="col-lg-3">
            @include('components.sidewidgetcomponent')
        </div>
        <div class="col-lg-1">
            
        </div>
    </div>
</div>
@endsection
