@extends('layout')

@section('page-title',$post->title)
@section('meta-content',$post->excerpt)

@section('content')
  <article class="post image-w-text container">
    <div class="content-post">
      
      @include('posts.header')

      <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          <figure class="block-left"><img src="/img/img-post-2.png" alt=""></figure>
          <div>
          	{!!$post->body!!}
          </div>
        </div>

        <footer class="container-flex space-between">
          <div class="buttons-social-media-share">
            <ul class="share-buttons">
              @include('partials.socialLinks',['description'=>$post->title])
            </ul>
          </div>
          @include('posts.tags')
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
        @include('partials.disqus-script')
                                
      </div><!-- .comments -->
    </div>
  </article>


@endsection


@push('scripts')
    <script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush