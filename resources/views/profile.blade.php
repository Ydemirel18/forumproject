@extends('layouts.app')
@section('js')

@endsection
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{url('/article/create')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Yazı Başlığı</label>
                    <input class="form-control" name="articlecontenttitle">
                </div>
                <div class="form-group">
                    <label>Yazı Özeti</label>
                    <input class="form-control" name="articlecontentdescription">
                </div>
                <div class="form-group">
                    <label>Yazı İçeriği</label>
                    <textarea class="form-control" name="articlecontent" rows='3'> </textarea>
                </div>
                <div class="form-group">
                    <select name="categories[]" class="form-control" multiple="multiple">
                        @if(count($categories)>0)
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                        @endif
                      </select>
                </div>
                <button type="submit" class="btn btn-primary">Kayıt Et</button>
            </form>
            <br>
            @if(count($articles)>0)
            <div class="row">
                <div class="col-md-2">Yazı Başlığı</div>
                <div class="col-md-2">Yazı Özeti</div>
                <div class="col-md-3">Yazı İçeriği</div>
                <div class="col-md-2">Güncellenme Tarihi</div>
                <div class="col-md-3">#</div>
            </div>
           
            @foreach ($articles as $item)
            <div class="row">
                <div class="col-md-2 content">{{$item->content_title}}</div>
                <div class="col-md-2 content">{{$item->content_description}}</div>
                <div class="col-md-3 content">{!! nl2br($item->content) !!}</div>
                <div class="col-md-3 content">{{$item->updated_at}}</div>
                <div class="col-md-2 content" style="float: left">
                    <a href="{{url('article/update/'.$item->id)}}">
                        <button type="button" class="btn btn-primary">Güncelle</button>
                    </a>
                    <form action="/article/{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="item" value="{{$item->id}}">
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </div>
            </div>
            @endforeach
            @endif   
            
            </pre>
        </div>
    </div>
</div>
@endsection