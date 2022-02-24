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
        @foreach ($articles as $article)
            <!-- Featured blog post-->
                    <div class="small text-muted"><a href="writerprofile/{{ $article->users->id }}"> {{ $article->users->name }} </a> - {{$article->updated_at}}</div>
                    <h2 class="card-title"> {{$article->content_title}}</h2>
                    <p class="card-text"> {{$article->content_description}}</p>
                    <a href="{{url('article/'.$article->id)}}"> Devamını oku! </a>
                    <hr>
        @endforeach
            {!! $articles->render() !!}
        </div>

    </div>
    <br><br><br>
</div>

@endsection
