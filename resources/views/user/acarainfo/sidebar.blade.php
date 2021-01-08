<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Search</h2>
            <form class="form-inline search-form" action="{{route('post.search')}}" method="get">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="search for events and information">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    @foreach($category_widget as $result)
                    <li><a href="{{ route('post.category', $result->slug )}}">{{ $result->name }} <span>{{ $result->posts->count() }}</span></a></li>
                    @endforeach
                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Popular Tags</h2>
            <div class="link-widget">
                <ul>
                    @foreach($tag as $result)
                    <li><a href="{{ route('post.tags', $result->slug )}}">{{ $result->name }} <span>{{ $result->posts->count() }}</span></a></li>
                    @endforeach
                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->

    </div><!-- end sidebar -->
</div><!-- end col -->