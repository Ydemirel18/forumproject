@extends('layouts.app')
@section('js')
    
@endsection
@section('css')
    
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($articles as $item)
            <form action="{{url('/article/update/'.$item->id)}}" method="put">
                @csrf
                <div class="form-group">
                    <label>Yazı Başlığı</label>
                    <input value="{{$item->content_title}}" class="form-control" name="articlecontenttitle">
                </div>
                <div class="form-group">
                    <label>Yazı Özeti</label>
                    <input value="{{$item->content_description}}" class="form-control" name="articlecontentdescription">
                </div>
                <div class="form-group">
                    <label>Yazı İçeriği</label>
                    <textarea  class="form-control" name="articlecontent" rows="5">{{$item->content}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
