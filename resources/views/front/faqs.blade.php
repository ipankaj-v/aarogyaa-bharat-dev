
@extends('front.layouts.layout')
@section('content')
<div class="banneranimationbox" >
                <div class="container">
                  <img src="{{asset('front/images/banner.jpg') }}" alt="">
				</div>
            </div>
<div class="breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="{{ route('home') }}">Home</a> </li>
            <li><a href="{{ route('faqs') }}">FAQ</a> </li>
        </ul>
    </div>    
</div>
@include('front.common.faq-section')
@endsection('content')