@extends('user.default')

@include('user.partials.header')

@include('user.acarainfo.introdetail')

@section('content')

<section class="section" id="popularContent">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                @foreach($data as $content_post)

                <div class="page-wrapper">
                    <div class="col">
                        <div class="media" data-aos="zoom-in" data-aos-delay="100">
                            <div class="masonry-box post-media" style="box-shadow: 0 5px 25px 0 rgba(214, 215, 216, 0.6); border-style: none;">
                                <img src="{{ asset($content_post->image)}}" alt="" class="img-fluid">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-aqua"><a href="{{ route('post.category', $content_post->category->slug )}}"
                                                    title="">{{$content_post->category->name}}</a></span>
                                            <h4><a href="{{ route('post.detail', $content_post->slug)}}"
                                                    title="">{{ $content_post->title }}</a></h4>
                                            <small><a href="#"
                                                    title="">{{ $content_post->created_at->diffForHumans() }}</a></small>
                                            <small><a href="#" title="">{{ $content_post->users->name }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div><!-- end post-media -->
                        </div>
                    </div>

                    <div class="blog-content">

                        <div class="pp mt-5">
                            <p>{!! $content_post->content !!}</p>
                        </div><!-- end pp -->
                        <div class="pp mt-5">
                            <div>
                                <div id="disqus_thread"></div>
<script>


(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://masjidbaitulhaqpurigading.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                            </div>
                        </div><!-- end pp -->
                    </div><!-- end content -->

                </div><!-- end page-wrapper -->

                @endforeach
            </div><!-- end col -->
            
            @include('user.acarainfo.sidebar')
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@include('user.partials.footer')

@endsection