@extends('front.layouts.layout')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{route('home')}}">Home</a> </li>
            <li><a href="{{route('blogs')}}">Blog</a> </li>
            <li><a href="#;">Blog Details</a> </li>
        </ul>
    </div>    
</div>

<section class="blog_text_data">
    <div class="container">
        <div class="blog_image_box">
            <div class="blog_image_height">
                @if ($blogDetails && $blogDetails->images && $blogDetails->images->isNotEmpty())
                    <img src="{{ asset('storage/' . $blogDetails->images->first()->path) }}" alt="">
                @else
                    <img src="{{ asset('front/images/wheelchair_2.png') }}" alt="Default Image">
                @endif
            </div>
        </div>
        <div class="blogtext_title">
            <h2>{{ $blogDetails->title  }}</h2>
        </div>
        <div class="blog_tag_name">
            <p class="articalauthor"><img src="{{ asset('front/images/author.svg') }}" alt="" />{{ $blogDetails->author  }}</p>
            <ul>
                <li class="tagBox"><p>{{ $blogDetails->tagname  }}</p></li>
                <li class="blogdate"><img src="{{ asset('front/images/calendar.svg') }}" alt=""><p>{{$blogDetails->created_at->format('m/d/y')}}</p></li>
                <li class="blogview"><img src="{{ asset('front/images/carbon_view.svg') }}" alt=""><p>{{ $blogDetails->views}}</p></li>
                <li><a href="https://wa.me/?text={{ urlencode('Check out this blog: ' . $blogDetails->title . ' ' . route('blog.details', $blogDetails->slug)) }}"><img src="{{ asset('front/images/ri_share-line.svg') }}" alt="{{$blogDetails->title}}"></a></li>
            </ul>
        </div>
        <div class="for_renting">
        {!! html_entity_decode($blogDetails->content_html) !!}
        </div>
    </div>
</section>

<section class="our_blog">
    <div class="container">
       <div class="titlePart">
            <h4>Our Blogs</h4> 
        </div>
        <div class="our_blog_all_box">
            @foreach($twoBlogs as $blog)
            <div class="our_blog_box">
                <div class="blog_image"><img src="{{ asset('storage/' .$blog->images->first()->path) }}" alt=""></div>
                <div class="blog_text">
                    <div class="text_one"><h2>{{$blog->title}}</h2><p>{{$blog->description}}</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>{{ $blog->tagname  }}</p></li>
                            <li class="blogdate"><img src="{{ asset('front/images/calendar.svg')}}" alt="" /><p>{{$blog->created_at->format('m/d/y')}}</p></li>
                            <li class="blogview"><img src="{{ asset('front/images/carbon_view.svg')}}" alt="" /><p>{{ $blog->views}}</p></li>
                            <li><a href="https://wa.me/?text={{ urlencode('Check out this blog: ' . $blog->title . ' ' . route('blog.details', $blog->slug)) }}"><img src="{{ asset('front/images/ri_share-line.svg')}}" alt="" /></a></li>
                        </ul>
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="blogreadnow">Read Now</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="our_blog_box">
                <div class="blog_image"><img src="images/bed.png" alt=""></div>
                <div class="blog_text">
                    <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>Tagename</p></li>
                            <li class="blogdate"><img src="images/calendar.svg" alt=""><p>04/02/24</p></li>
                            <li class="blogview"><img src="images/carbon_view.svg" alt=""><p>424</p></li>
                            <li><a href="#;"><img src="images/ri_share-line.svg" alt=""></a></li>
                        </ul>
                        <a href="#;" class="blogreadnow">Read Now</a>
                    </div>
                </div>
            </div> -->   
        </div>
        <!-- <div class="read_more_blogs"><a href="#;"><p>Read More Blogs</p><img src="{{asset('front/images/downArrow.svg')}}" alt=""></a></div> -->
    </div>
</section>
@endsection