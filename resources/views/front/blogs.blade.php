@extends('front.layouts.layout')
@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="#;">Home</a> </li>
            <li><a href="#;">Blog</a> </li>
        </ul>
    </div>    
</div>

<section class="Trending_Topics">
    <div class="container">
        <div class="Trending_Topics_title"><h2>Trending Topics</h2></div>
        <div class="Products_tag">
            <ul>
                @foreach($blogs as $blog)
                <li><a href="{{ route('blog.details', ['slug' => $blog->slug]) }}"><p>{{$blog->name}}</p><img src="{{asset('front/images/chartArrow.svg')}}" alt="" /></a></li>
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
            <div class="left_part_blog">
            @foreach($blogs as $blog)
            <div class="our_blog_box">
                <div class="blog_image"><img src="{{ asset('storage/' . $blog->images->first()->path) }}" alt="" /></div>
                <div class="blog_text">
                    <div class="text_one"><h2>{{$blog->name}}</h2><p>{{$blog->title}}</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>Tagename</p></li>
                            <li class="blogdate"><img src="{{ asset('front/images/calendar.svg')}}" alt="" /><p>{{$blog->created_at->format('m/d/y')}}</p></li>
                            <li class="blogview"><img src="{{ asset('front/images/carbon_view.svg')}}" alt="" /><p>424</p></li>
                            <li><a href="#;"><img src="{{ asset('front/images/ri_share-line.svg')}}" alt="" /></a></li>
                        </ul>
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="blogreadnow">Read Now</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="our_blog_box">
                <div class="blog_image"><img src="images/bed.png" alt="" /></div>
                <div class="blog_text">
                    <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>Tagename</p></li>
                            <li class="blogdate"><img src="images/calendar.svg" alt="" /><p>04/02/24</p></li>
                            <li class="blogview"><img src="images/carbon_view.svg" alt="" /><p>424</p></li>
                            <li><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></li>
                        </ul>
                        <a href="#;" class="blogreadnow">Read Now</a>
                    </div>
                </div>
            </div>
            <div class="our_blog_box">
                <div class="blog_image"><img src="images/bed.png" alt="" /></div>
                <div class="blog_text">
                    <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>Tagename</p></li>
                            <li class="blogdate"><img src="images/calendar.svg" alt="" /><p>04/02/24</p></li>
                            <li class="blogview"><img src="images/carbon_view.svg" alt="" /><p>424</p></li>
                            <li><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></li>
                        </ul>
                        <a href="#;" class="blogreadnow">Read Now</a>
                    </div>
                </div>
            </div>
            <div class="our_blog_box">
                <div class="blog_image"><img src="images/bed.png" alt="" /></div>
                <div class="blog_text">
                    <div class="text_one"><h2>Medical Bed</h2><p>Kros samuktig neturen, herer of it isherer ann uppaskae. Mikok coko invertering hemissade Fredrik Åkesson...</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>Tagename</p></li>
                            <li class="blogdate"><img src="images/calendar.svg" alt="" /><p>04/02/24</p></li>
                            <li class="blogview"><img src="images/carbon_view.svg" alt="" /><p>424</p></li>
                            <li><a href="#;"><img src="images/ri_share-line.svg" alt="" /></a></li>
                        </ul>
                        <a href="#;" class="blogreadnow">Read Now</a>
                    </div>
                </div>
            </div> -->
            </div>
            <div class="right_part_blog">
                <div class="blog_image_box">
                    <div class="blog_image_height"><img src="{{ asset('storage/' . $oneBlog->images->first()->path) }}" alt=""></div>
                </div>
                <div class="blog_text">
                    <div class="text_two"><h2>{{$oneBlog->name}}</h2><p>{{$oneBlog->title}}</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>Tagename</p></li>
                            <li class="blogdate"><img src="{{asset('front/images/calendar.svg')}}" alt=""><p>{{$blog->created_at->format('m/d/y')}}</p></li>
                            <li class="blogview"><img src="{{asset('front/images/carbon_view.svg')}}" alt=""><p>424</p></li>
                            <li><a href="#;"><img src="{{asset('front/images/ri_share-line.svg')}}" alt=""></a></li>
                        </ul>
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="blogreadnow">Read Now</a>
                    </div>
                </div>
                <div class="read_more_blogs"><a href="#;"><p>Read More Blogs</p><img src="{{asset('front/images/downArrow.svg')}}" alt=""></a></div>
            </div>
        </div>
    </div>
</section>
@endsection