@extends('layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Side widgets-->
        <div class="col-lg-2">
            @include('components.sidewidgetcomponent')
        </div>
        <!-- Blog entries-->
        <div class="col-lg-10">
            @if(count($article_categories) > 0)
            <p>
                <h3> {{$category_name}} </h3>
            </p>
            @else
            <p>
                <h3> {{$category_name}} kategorisine ait yazı bulunamamıştır.</h3>
            </p>
            @endif
        @foreach ($article_categories as $article)
            <!-- Featured blog post-->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="small text-muted">{{$article->name}} - {{$article->articles->updated_at}}</div>
                    <h2 class="card-title"> {{$article->articles->content_title}}</h2>
                    <p class="card-text">
                         {{$article->articles->content_description}}
                    </p>
                    <a href="{{url('article/'.$article->articles->id)}}"> Devamını oku! </a>
                </div>
            </div>
        @endforeach
        </div>

    </div>
</div>
@endsection
