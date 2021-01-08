@extends('user.default')

@include('user.partials.header')

@include('user.acarainfo.intro')

@section('content')

<section class="section" id="popularContent">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

                @foreach($data as $list_post)
                <div class="page-wrapper" id="latest">
                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="#" title="">
                                        <img src="{{ asset($list_post->image)}}" alt="{{ $list_post->title }}"
                                            class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <span class="bg-aqua"><a href="{{ route('post.category', $list_post->category->slug )}}" title="">{{ $list_post->category->name }}</a></span>
                                <h4><a href="{{ route('post.detail', $list_post->slug)}}" title="">{{ $list_post->title }}</a></h4>
                                <p>{!! substr($list_post->content, 100, 200) !!}</p>
                                <small><a href="#"
                                        title="">{{ $list_post->created_at->diffForHumans() }}</a></small>
                                <small><a href="#" title="">{{ $list_post->users->name }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->
                @endforeach
                <hr class="invis">

                <div class="row">
                    <div class="col">
                        {{ $data->links() }}
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
            @include('user.acarainfo.sidebar')
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@include('user.partials.footer')

@endsection