@extends('layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(count($article_categories) > 0)
            <p>
                <h4> {{$category_name}} </h4>
            </p>
            @else
            <p>
                <h3> {{$category_name}} kategorisine ait yazı bulunamamıştır.</h3>
            </p>
            @endif
             <?php 
            $count = 1;
            ?>
        @foreach ($article_categories as $key => $article)

        @if ($key % 2 == 0)
        <div class="row">
       @endif
       <!-- Collapsable Card Example -->
       <div class="col-md-6">
       <div style="font-family: 'Smooch Sans', sans-serif;" class="card shadow" >
           <div class="card">
               <div class="card-body">
               <div class="row">
                   <div class="col-md-6">
                   <div class="small text-muted">  
                       <a href="/writerprofile/{{$article->id}}">{{$article->name}} </a> - {{$article->articles->updated_at}}</div>
                   <h2 class="card-title h5">{{$article->articles->content_title}}</h2>
                   <p class="card-text h6">{{$article->articles->content_description}}</p>
                   <a class="btn btn-primary" href="{{url('article/'.$article->articles->id)}}">Yazıyı oku</a>
                   </div>
                   <div class="col-md-6">
                    <div style="float: right;" >
                        <img style="width: 100%" class="img-fluid" src="{{ asset($article->articles->content_image) }}"/>
                    </div>
                </div>
               </div>
           </div>
       </div>
       </div>
       </div>
       @if ($count==2)
        </div>
        <?php $count=0; ?>
       @endif
       <?php  $count++; ?>
        @endforeach
        </div>
       <br><br>
    </div>
    <br><br>
    <div style="font-family: 'Smooch Ssans', sans-serif;margin:0 auto; display:flex;justify-content:center;"> {!! $article_categories->render() !!} </div>
    <br><br>   <br><br>
@endsection
