@extends('layouts.app')
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <div class="row">

        <!-- Blog entries-->
        <div class="col-12">
            <?php 
            $count = 1;
            ?>
        @foreach ($articles as $key=>$article)
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
                            <a style="color: black; text-decoration: none;" href="/writerprofile/{{$article->users->id}}">{{$article->users->name}} </a> - {{$article->updated_at}}
                        </div>
                                     <h2 class="card-title h4"> 
                                          <a style="color: black;text-decoration:none;" href="{{url('article/'.$article->id)}}">
                                           {{$article->content_title}}
                                         </a>
                                    </h2>
                                <p class="card-text">{{$article->content_description}}</p>
                        </div>
                        <div class="col-md-6">
                            <div style="float: right;" >
                                <a style="color: black;text-decoration:none;" href="{{url('article/'.$article->id)}}">
                                <img style="width: 100%" class="img-fluid" src="{{ asset($article->content_image)}}"/>
                                </a>
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
            <br><br>
            <div style="font-family: 'Smooch Ssans', sans-serif;margin:0 auto; display:flex;justify-content:center;">
              {!! $articles->render() !!}
            </div>
            <br><br>
        </div>
</div>
@endsection