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

        <!-- <div class="for_renting">
            <h2>For Renting</h2>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.</p>
            <ul>
                <li><p>Manual propulsion by the seated occupant turning the rear wheels by hand.</p></li>
                <li><p>The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p></li>
                <li><p>The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p></li>
                <li><p>A wheelchair is a chair fitted with wheels.</p></li>
                <li><p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing.</p></li>
            </ul>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.</p>
            <p class="balckline">A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p>
        </div>
        <div class="for_renting">
            <h2>For Buying</h2>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.</p>
            <ul>
                <li><p>Manual propulsion by the seated occupant turning the rear wheels by hand.</p></li>
                <li><p>The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p></li>
                <li><p>The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p></li>
                <li><p>A wheelchair is a chair fitted with wheels.</p></li>
                <li><p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing.</p></li>
            </ul>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p>
            <p>A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand or electric propulsion by motors.</p>
            <p class="balckline">A wheelchair is a chair fitted with wheels. The device comes in variations allowing either manual propulsion by the seated occupant turning the rear wheels by hand.</p>
        </div> -->
    </div>
</section>
@endsection