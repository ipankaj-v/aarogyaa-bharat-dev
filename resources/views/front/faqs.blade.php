
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
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script>
function changeTab(categoryId) {
    $('.faq_box').hide();
    $('#category_' + categoryId).show();
}

</script>
@endsection('content')