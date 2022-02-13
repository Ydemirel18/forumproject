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
                                <a href="category/{{$category->id}}">
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
{!! $articles->render() !!}
@endsection
