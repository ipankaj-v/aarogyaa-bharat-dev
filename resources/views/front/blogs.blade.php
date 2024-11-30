@extends('front.layouts.layout')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{route('home')}}">Home</a> </li>
            <li><a href="{{route('blogs')}}">Blog</a> </li>
        </ul>
    </div>    
</div>

<section class="Trending_Topics">
    <div class="container">
        <div class="Trending_Topics_title"><h2>Trending Topics</h2></div>
        <div class="Products_tag">
            <ul>
                @foreach($trendingBlogs as $trendingBlog)
                <li><a href="{{ route('blog.details', ['slug' => $trendingBlog->slug]) }}"><p>{{$trendingBlog->name}}</p><img src="{{asset('front/images/chartArrow.svg')}}" alt="" /></a></li>
                @endforeach
            </ul>
          </div>
    </div>
</section>



<section class="our_blog">
    <div class="container">
       <div class="titlePart2">
            <h4>Recommended Blogs</h4> 
        </div>

        <div class="part_blog">
                @include('front.common.recommended-blog')
                
        </div>
    </div>
</section>
@endsection
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script>

    $(document).on('click', '.pagination .page-link', function(e) {
        e.preventDefault();
        var page = $(this).text();
        var data = { page: page };
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            data: data,
            success: function(response) {
                if(response.success) {
                    $('.part_blog').html(response.recommendedBlogHtml);
                }
            }
        });
    });
</script>