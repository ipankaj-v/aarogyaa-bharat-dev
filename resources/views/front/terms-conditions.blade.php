@extends('front.layouts.layout')
@section('content')
<div class="banneranimationbox" >
                <div class="container">
                  <img src="{{asset('front/images/banner.jpg')}}" alt="">
				</div>
            </div>
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{route('home')}}">Home</a> </li>
            <li><a href="{{route('terms.and.conditions')}}">Terms and Conditions</a> </li>
        </ul>
    </div>    
</div>
<section class="termandconditions">
    <div class="container">
        <div class="main_title"><h2>{{$page->cms->title}}</h2></div>
        {!! preg_replace('/\s+/', ' ', trim(strip_tags(html_entity_decode($page->cms->content), '<b><i><u><strong><em><p><ul><li><h2>'))) !!}
    </div>
</section>
@endsection