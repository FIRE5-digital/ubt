@if($top_offer)

<div class="full-header-feature">
    <a href="{{ @$top_offer->getUrl(true) }}">
        <div class="feature-cta-box">
            <div class="feature-name">
                <div>
                    <h3>{{ @$top_offer->range_name }}</h3>
                    <p>{{ @$top_offer->name }}</p>
                </div>
            </div>
            <div class="feature-price">
                &pound;{{ @$top_offer->getFromPrice($top_offer->getFromTopDeal()->type) }}<span>/PM</span>
            </div>
        </div>
        <div class="feature-img-ctr img-container">
            <picture>
                <img src="{!! $top_offer->getMainImage('xlarge') !!}" alt="{{ @$top_offer->range_name }} {{ @$top_offer->name }}">
            </picture>
        </div>
    </a>
</div>

@endif