@if(isset($offers) && count($offers) > 0)
    @foreach($offers as $offer)
        <div class="flatOffer">
            <img src="{{ asset('front/images/flat_offer.svg') }}" alt="" />
            <div class="flatCon">
                <strong>{{ $offer->title }}</strong>
                <p>{{ $offer->description }}</p>
            </div>
            <div class="linkPart" id="linkPart-{{ $offer->code }}">
                <span>*T&C apply</span>
                <a href="#" id="apply-{{ $offer->code }}" onclick="applyOffer('{{ $offer->code }}')">Apply Now</a>
            </div>
            <div class="removeDiscount" id="removeDiscount-{{ $offer->code }}" style="display:none;">
                <a href="#" id="remove-{{ $offer->code }}" onclick="removeOffer('{{ $offer->code }}')">Remove</a>
            </div>
        </div>
    @endforeach
@else
    <p>No offers available.</p>
@endif
