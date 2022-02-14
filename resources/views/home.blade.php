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
        @foreach ($articles as $article)
            <!-- Featured blog post-->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="small text-muted"><a href="writerprofile/{{ $article->users->id }}"> {{ $article->users->name }} </a> - {{$article->updated_at}}</div>
                    <h2 class="card-title"> {{$article->content_title}}</h2>
                    <p class="card-text"> {{$article->content_description}}</p>
                    <a href="{{url('article/'.$article->id)}}"> Devamını oku! </a>
                </div>
            </div>
        @endforeach
        </div>
        <!-- Side widgets-->
        <div class="col-lg-3">
            @include('components.sidewidgetcomponent')
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
{!! $articles->render() !!}
@endsection
