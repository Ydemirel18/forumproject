@extends('layouts.app')
@section('js')
    
@endsection
@section('css')
    
@endsection
@section('content')
<div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-9">
            @foreach ($articles as $item)
            <div class="card" style="margin-bottom: 4px;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10" style="color: #2577b1;padding-left:25px;">
                        <a href="{{url('article/'.$item->id)}}">
                            {{$item->content_title}}
                            </a>
                        </div>
                        <div class="col-md-2" >
                            <div style="font-size: 12px;"> {{$item->user->name}}</div>
                            <div style="font-size: 10px;">{{$item->updated_at}}</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$item->content_description}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row justify-content-center">
    {!! $articles->render() !!}
    </div>
</div>

@endsection
