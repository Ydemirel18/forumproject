@extends('layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <p> <h4><b>{{$userarticles[0]->name}}</b></h4><h5> yazarına ait yazılar  </h5></p><br>
        @foreach ($userarticles[0]->articles as $item)
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
    </div>
@endsection
