@extends('layouts.app')
@section('js')

@endsection
@section('css')

@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @foreach ($articles as $item)
            <article>
                <header class="mb-4">
                    <h4 class="fw-bolder mb-1" style="font-family: Arial, Helvetica, sans-serif;">{{ $item->content_title }}</h4>
                    <div class="text-muted fst-italic mb-2">
                    {{ $item->updated_at }} tarihinde {{ $item->users->name }} tarafından paylaşıldı</div>
                </header>
                <section class="mb-5">
                    <p class="fs-5 mb-4" style="overflow-wrap: break-word;">{!! $item->content !!}</p>
                   </section>
            </article>
            @endforeach
            @if (count($comments)>0)
            <section class="mb-5">
                <div>
                    <b>YAZI İLE İLGİLİ YORUMLAR</b>
                    <div class="card-body" style="overflow-wrap: break-word;">
                        @foreach ($comments as $comment)
                        <div class="d-flex" >
                            <div class="flex-shrink-0">
                                <img class="rounded-circle" src={{asset('img/account.png')}} alt="..." />
                            </div>
                            <div class="col-lg-10">
                            <div class="ms-3" >
                                <b>{{$comment->users->name}}</b><br>
                                <p style="padding-right: 10%;">
                                    {{$comment->comment}}
                                </p>
                            </div>
                            </div>
                         </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            @auth
            <form action="{{url('/comment/create')}}" method="get" class="mb-4">
                <textarea class="form-control"  name="articlecomment" rows="3" placeholder="Tartışmaya katıl ve bir yorum bırak!" required></textarea>
                <input type="hidden"  name="articleid" value="{{$item->id}}"><br>
                <button type="submit" class="btn btn-success">Yorum Gönder</button>
            </form>
            @endauth
        </div>
    </div>
@endsection
