<section class="frequently_asked_questions">
    <div class="container">
        <div class="faq_title"><h2>Frequently asked questions</h2></div>
        @foreach($faqs as $faq)
        <div class="faq_box">
            <a href="javascript:void(0)"><p>{{$faq->question}}</p><img src="{{asset('front/images/jam_plus.svg') }}" alt="" /></a>
            <div class="faq_box_text">
                <p>{{$faq->answers[0]->answer}}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>