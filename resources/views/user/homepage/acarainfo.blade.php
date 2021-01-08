<section id="new_post">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>Blog</h3>
            <p>Informasi & Berita </p>
        </header>

        <div class="row row-eq-height justify-content-center">
            @foreach($data as $new_post)
            <div class="col-lg-4 mb-4">
                <div class="media" data-aos="zoom-in" data-aos-delay="100"> 
                    <div class="masonry-box post-media">
                        <img src="{{ asset($new_post->image)}}" alt="" class="img-fluid">
                        <div class="shadoweffect">
                            <div class="shadow-desc">
                                <div class="blog-meta">
                                    <span class="bg-aqua"><a href="{{ route('post.category', $new_post->category->slug )}}"
                                            title="">{{$new_post->category->name}}</a></span>
                                    <h4><a href="{{ route('post.detail', $new_post->slug)}}" title="">{{ $new_post->title }}</a></h4>
                                    <small><a href="#"
                                            title="">{{ $new_post->created_at->diffForHumans() }}</a></small>
                                    <small><a href="#" title="">{{ $new_post->users->name }}</a></small>
                                </div><!-- end meta -->
                            </div><!-- end shadow-desc -->
                        </div><!-- end shadow -->
                    </div><!-- end post-media -->
                </div>
            </div>
            @endforeach
            
        </div>
        <footer class="section-footer" style="margin-top: 30px; margin-bottom: 50px; text-align: center">
            <a href="{{ route('post.list')}}"><button class="btn btn-primary">Read More!</button></a>
        </footer>


    </div>
</section><!-- End Why Us Section -->