

@extends('user/app')

@section('bg-img',Storage::disk('local')->url($slug->image))

@section('title',$slug->title)

@section('slogan',$slug->slogan)

@section('main-content')


<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <small>created at {{$slug->created_at->diffForHumans()}}</small>
          
            @foreach($slug->categories as $category)
            <a href="{{route('category',$category->slug)}}"><small class="float-right" style="margin-left:20px;">
              {{$category->name}}
              </small></a>
            @endforeach

          

           {!! html_entity_decode($slug->body) !!}


           @foreach($slug->tags as $tag)
            <a href="{{route('tag',$tag->slug)}}"><small class="float-right" style="margin-left:20px;">
              {{$tag->name}}
              </small></a>
            @endforeach
        </div>
        <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
      </div>
    </div>
  </article>

  <hr>
@endsection