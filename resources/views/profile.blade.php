@extends('layouts.app')
@section('js')

@endsection
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">

        </div>
        <div class="col-md-10">
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
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tüm yazılar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Özet</th>
                                <th>İçerik</th>
                                <th>Tarih</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            @foreach ($articles as $item)
                            <tbody>
                            <tr>
                                <td>{{$item->content_title}}</td>
                                <td>{{$item->content_description}}</td>
                                <td>{!! nl2br($item->content) !!}</td>
                                <td>{{$item->updated_at}}</td>
                                <td> <a href="{{url('article/update/'.$item->id)}}">
                                        <button type="button" class="btn btn-primary">Güncelle</button>
                                    </a>
                                    <form action="/article/{{ $item->id }}" method="post">
                                        @csrf
                                        <input type="hidden" name="item" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-danger">Sil</button>
                                        @method('DELETE')
                                    </form></td>
                            </tr>
                            </tbody>
                            @endforeach
                            {!! $articles->render() !!}
                        </table>
                    </div>
                </div>
            </div>
        </div>
                @endif

    </div>
    <br>
    <br>
</div>

@endsection
