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
        @foreach ($articles as $item)
            <!-- Featured blog post-->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="small text-muted">{{$item->user->name}} - {{$item->updated_at}}</div>
                    <h2 class="card-title"> {{$item->content_title}}</h2>
                    <p class="card-text"> {{$item->content_description}}</p>
                    <a href="{{url('article/'.$item->id)}}"> Devamını oku! </a>
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
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! $articles->render() !!}
@endsection
