<div class="deal-box-vertical">
    <div class="deal-box-img">
        <div class="deal-box-tags">
            <span class="tags-star-secondary">
                Special Offer
            </span>
            @if($deal->in_stock)
            <span data-content="In Stock" class="tags-tick-tertiary">
                Quick Delivery
            </span>
            @endif
        </div>
        <a href="{{ $deal->getUrl() }}" title="View {{ $deal->model_name }} deal">
            <img class="lazy" width="750" height="500" src="/themes/ubt/img/vehicle/placeholder-car.png" data-src="{{ $deal->getMainImage('large') }}" alt="{{ $deal->short_name }}">
        </a>
    </div>
    <div class="deal-box-content">
        <div class="deal-box-content-ctr">
            <h3>{{ $deal->model_name }} </h3>
            <p>{{ $deal->name }}</p>
        </div>
        <div class="deal-box-extra">
            <div class="deal-box-price">
                <div>{{ $deal->getFromPrice('Personal', true) }} <span>/pm</span></div>
                <span>Personal lease (inc VAT)</span>
            </div>
            <div class="deal-box-terms">
                <ul>
                    <li>Initial rental: &pound;1,271</li>
                    <li>48 Month Contract</li>
                    <li>10,000 Miles</li>
                </ul>
            </div>
        </div>
    </div>
</div><!--deal-box-->