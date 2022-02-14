@extends('layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
        <p><h3>  {{$userarticles[0]->name}} YAZARINA AİT YAZILAR  </h3></p><br>
        @foreach ($userarticles[0]->articles as $item)
            <!-- Featured blog post-->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="small text-muted">{{$userarticles[0]->updated_at}}</div>
                    <h2 class="card-title"> {{$item->content_title}}</h2>
                    <p class="card-text"> {{$item->content_description}}</p>
                    <a href="{{url('article/'.$item->id)}}"> Devamını oku! </a>
                </div>
            </div>
        @endforeach
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            @include('components.sidewidgetcomponent')
        </div>
    </div>
</div>
@endsection
