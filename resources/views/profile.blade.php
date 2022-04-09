@extends('layouts.app')
@section('js')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
@endsection
@section('css')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{url('/article/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                   role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Yazı Ekleme</h6>
                </a>
                <div class="collapse" id="collapseCardExample">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Yazı Başlığı</label>
                            <input class="form-control" name="articlecontenttitle">
                        </div>
                        <div class="form-group">
                            <label>Yazı Resmi</label><br>
                            Yüklemek istediğiniz resmi seçiniz:
                            <input type="file" name="content_image" id='content_image'>
                        </div>
                        <div class="form-group">
                            <label>Yazı Özeti</label>
                            <input class="form-control" name="articlecontentdescription">
                        </div>
                            <label>Yazı İçeriği</label>
                            <div class="form-group">
                               <textarea id="summernote" name="articlecontent" rows="18">
                               </textarea>
                            </div>
                            <script type="application/javascript">
                              $('#summernote').summernote({
                                placeholder: 'Hello stand alone ui',
                                tabsize: 2,
                                height: 120,
                                toolbar: [
                                  ['style', ['style']],
                                  ['font', ['bold', 'underline', 'clear']],
                                  ['color', ['color']],
                                  ['para', ['ul', 'ol', 'paragraph']],
                                  ['table', ['table']],
                                  ['insert', ['link', 'picture']],
                                  ['view', [ 'codeview']]
                                ]
                              });
                            </script>
                        <div class="form-group">
                            Kategori
                            <select name="categories[]" class="form-control" multiple="multiple">
                                @if(count($categories)>0)
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Kayıt Et</button>
                    </div>
                </div>
            </div>
            </form>
            @if(count($articles)>0)
            <div class="card shadow mb-4">
            
                    <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample2">
                     <h6 class="m-0 font-weight-bold text-primary">Tüm yazılar</h6>
                 </a>

                <div class="collapse" id="collapseCardExample2">
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
                                <td>{!! ($item->content) !!}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <a href="{{url('article/update/'.$item->id)}}">
                                        <button type="button" class="btn btn-primary" style="margin-bottom: 10px;width: 80px;font-size: 12px;">Güncelle</button>
                                    </a>
                                    <form action="/article/{{ $item->id }}" method="post">
                                        @csrf
                                        <input type="hidden" name="item" value="{{$item->id}}">
                                        <button type="submit" class="btn btn-danger" style="width: 80px;font-size: 12px">Sil</button>
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
        </div>
                @endif
    </div>
    <br>
    <br>
@endsection
