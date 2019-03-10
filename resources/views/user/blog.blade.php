@extends('user/app')

@section('bg-img',asset('user/img/home-bg.jpg'))

@section('main-content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">


      @foreach($posts as $post)
        <div class="post-preview">
          <a href="{{ route('post',$post->slug)}}">
            <h2 class="post-title">
              {{ $post->title }}
            </h2>
            <h3 class="post-subtitle">
              {{ $post->slogan }}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
           created at {{$post->created_at->diffForHumans()}}</p>
        </div>
        <hr>
      @endforeach
       
        <!-- Pager -->
        <div class="clearfix">
          {{ $posts->links() }}
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

@endsection