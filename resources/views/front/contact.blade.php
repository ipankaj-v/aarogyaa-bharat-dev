@extends('front.layouts.layout')
@section('content')
<div class="banneranimationbox" >
                <div class="container">
                @if (isset($contactPageData) && isset($contactPageData->cms) && $contactPageData->cms->images && $contactPageData->cms->images->isNotEmpty())
                  <img src="{{ asset('storage/' .$contactPageData->cms->images->first()->path) }}" alt="" style="height: 300px; margin-bottom: 15px;">
                @else
                        <img src="{{ asset('front/images/banner.jpg') }}" alt="" style="height: 300px; margin-bottom: 15px;">
                @endif
				</div>
            </div>
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{ route('home') }}">Home</a> </li>
            <li><a href="{{ route('front.contact') }}">Contact us</a> </li>
        </ul>
    </div>    
</div>

<section class="contact_us_text">
    <div class="container">
        <div class="contact_us_now">
            <h2>Contact us</h2>
            <ul>
                <li><a href="tel:{{ env('HELP_LINE_NO') }}"><img src="{{asset('front/images/phone_call.svg') }}" alt="" /><p>{{ env('HELP_LINE_NO')}} </p><span>Call Now</span></a></li>
                <li><a href="mailto:{{ env('HELP_LINE_EMAIL') }}"><img src="{{asset('front/images/mail.svg') }}" alt="" /><p>{{ env('HELP_LINE_EMAIL') }}</p></a></li>
            </ul>
        </div>
    </div>
</section>

<section class="our_blog">
    <div class="container">
       <div class="titlePart2">
            <h4>Our Blogs</h4> 
        </div>
        <div class="our_blog_all_box">
            <div class="row18">
            @php
                $randomBlog = $contactusBlog->random();
            @endphp
            <div class="our_blog_box">
                <div class="blog_image"><img src="{{ asset('storage/' .$randomBlog->images->first()->path) }}" alt="" /></div>
                <div class="blog_text">
                    <div class="text_one">
                        <a href="{{ route('blog.details', ['slug' => $randomBlog->slug]) }}">
                            <h1>{{$randomBlog->title}}</h1>
                        </a>    
                        <p>{{$randomBlog->description}}</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>{{ $randomBlog->tagname  }}</p></li>
                            <li class="blogdate"><img src="{{ asset('front/images/calendar.svg')}}" alt="" /><p>{{$randomBlog->created_at->format('m/d/y')}}</p></li>
                            <li class="blogview"><img src="{{ asset('front/images/carbon_view.svg')}}" alt="" /><p>{{ $randomBlog->views}}</p></li>
                            <li><a href="#;"><img src="{{ asset('front/images/ri_share-line.svg')}}" alt="" /></a></li>
                        </ul>
                        <a href="{{ route('blog.details', ['slug' => $randomBlog->slug]) }}" class="blogreadnow">Read Now</a>
                    </div>
                </div>
            </div>
            @if($contactusBlog)
            @foreach($contactusBlog  as $blog)
            <div class="our_blog_box">
                <div class="blog_image"><img src="{{ asset('storage/' .$blog->images->first()->path) }}" alt="" /></div>
                <div class="blog_text">
                    <div class="text_one"><h2>{{$blog->title}}</h2><p>{{$blog->description}}</p></div>
                    <div class="blog_tag_name">
                        <ul>
                            <li class="tagBox"><p>{{ $blog->tagname  }}</p></li>
                            <li class="blogdate"><img src="{{ asset('front/images/calendar.svg')}}" alt="" /><p>{{$blog->created_at->format('m/d/y')}}</p></li>
                            <li class="blogview"><img src="{{ asset('front/images/carbon_view.svg')}}" alt="" /><p>{{ $blog->views}}</p></li>
                            <li><a href="#;"><img src="{{ asset('front/images/ri_share-line.svg')}}" alt="" /></a></li>
                        </ul>
                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}" class="blogreadnow">Read Now</a>
                    </div>
                </div> 
             </div>
            @endforeach
            @endif
            </div>
        </div>
        <div class="read_more_blogs"><a href="{{route('blogs')}}"><p>Read More Blogs</p><img src="{{asset('front/images/downArrow.svg')}}" alt="" /></a></div>
    </div>
</section>
@endsection('content')