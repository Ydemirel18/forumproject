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
                  
                    <h2> {{ $item->content_title }}</h2>
                    <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $item->user->name }},
                        {{ $item->updated_at }}</h5>
                    <p style="overflow: auto"> {!! nl2br($item->content) !!}</p>
                    <br>
                @endforeach
                @foreach ($comments as $comment)

                    <div class="card">
                        <div class="card-header">
                          {{$comment->user->name}}
                        </div>
                        <div class="card-body">
                             {{$comment->comment}}
                        </div>
                      </div>
                     <br>
                @endforeach
                    @auth
                        <br>
                        <h4>Bir yorum bırak:</h4>
                        <form action="{{url('/comment/create')}}" method="get">
                            <div class="form-group">
                                <textarea class="form-control" rows="2" name="articlecomment" required></textarea>
                                <input type="hidden"  name="articleid" value="{{$item->id}}">
                            </div>
                            <button type="submit" class="btn btn-success">Gönder</button>
                        </form>
                        <br>
                        <br>
                    @endauth
             
            </div>
            <div class="col-md-3">
                  <h4>Kategoriler</h4>
                  @foreach ($categories as $item)
                      
                  @endforeach
            </div>
        </div>
    </div>
@endsection
