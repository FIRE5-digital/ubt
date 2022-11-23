<!-- DEAL BOX -->
<div class="deal-box carousel-cell">
    <div class="deal-box-title padding module">
        <div class="deal-box-content-ctr">
            <h2>{{ $deal->model_name }}</h2>
            <p>{{ $deal->name }}</p>
        </div>
    </div>

    <div class="deal-box-img">
        <div class="inner">
            <a href="{{ $deal->getRange->getUrl() }}" title="View {{ $deal->range_name }} deal" class="more-link">
                More {{ $deal->getRange->name }} offers
                <svg class="icon after inline">
                    <use xlink:href="/themes/ubt/scss/deal-boxes/sprite.svg#icon-arrow-right"></use>
                </svg>
            </a>

            <div class="deal-box-tags">
                @if($deal->special_offer)
                    <span class="secondary">
                    <svg class="icon before">
                        <use xlink:href="/themes/ubt/scss/deal-boxes/sprite.svg#icon-featured"></use>
                    </svg>
                    Top deal
                </span>
                @endif
                @if($deal->in_stock)
                    <span data-content="In Stock" class="tertiary">
                    Quick Delivery
                </span>
                @endif
            </div>

            <a href="{{ @$deal->getUrl() }}" title="{{ $deal->short_name }}">
                <img class="lazy" src="/themes/ubt/img/placeholder.png" data-src="{{ @$deal->getMainImage('large') }}" alt="{{ $deal->short_name }}">
            </a>
        </div>
    </div>

    <div class="deal-box-highlight module">
        @if($deal->highlight)
            <p>{{ $deal->highlight }}</p>
        @endif
    </div>

    <div class="price">
        <div class="price-personal padding">
            <div class="price-ctr">
                <h3>PERSONAL</h3>
                @if(\Request::filled('term')||\Request::filled('mileage')||\Request::filled('initial_profile'))
                    @php($personal_price=@$deal->getDealBySearch('Personal'))
                @else
                    @php($personal_price=@$deal->getFromDeal('Personal'))
                @endif
                @if($personal_price)
                    <p><strong>&pound;{{ number_format($personal_price->monthly_rental,2) }}</strong> <span class="vat">inc VAT</span></p>
                @else
                    <p><strong>POA</strong></p>
                @endif
            </div>

            <div class="terms-ctr">
                <p class="initial">Initial rental: <span>&pound;{{ number_format(@$personal_price->initial_payment,2) }} inc VAT</span></p>
                <ul class="terms module layout">
                    <li>{{ @$personal_price->term }} months</li>

                    <li>{{ @$personal_price->mileage }} miles pa</li>
                </ul>
            </div>
        </div>

        <div class="price-business padding">
            <div class="price-ctr">
                <h3>BUSINESS</h3>
                @if(\Request::filled('term')||\Request::filled('mileage')||\Request::filled('initial_profile'))
                    @php($business_price=@$deal->getDealBySearch('Business'))
                @else
                    @php($business_price=@$deal->getFromDeal('Business'))
                @endif
                @if($business_price)
                    <p><strong>&pound;{{ number_format($business_price->monthly_rental,2) }}</strong> <span class="vat">+ VAT</span></p>
                @else
                    <p><strong>POA</strong></p>
                @endif
            </div>

            <div class="terms-ctr">
                <p class="initial">Initial rental: <span>&pound;{{ number_format(@$business_price->initial_payment,2) }} + VAT</span></p>
                <ul class="terms module layout">
                    <li>{{ @$business_price->term }} months</li>
                    <li>{{ @$business_price->mileage }} miles pa</li>
                </ul>
            </div>
        </div>
    </div>

    <ul class="terms padding module layout">
        <li>{{ @$business_price->term }} months</li>

        <li>{{ @$business_price->mileage }} miles pa</li>
    </ul>

    <ul class="features layout padding">
        <li>
            <svg class="icon">
                <use xlink:href="/themes/ubt/scss/deal-boxes/sprite.svg#icon-air-con"></use>
            </svg>

            <span>Air-con</span>
        </li>

        <li>
            <svg class="icon">
                <use xlink:href="/themes/ubt/scss/deal-boxes/sprite.svg#icon-apple-carplay"></use>
            </svg>

            <span>Apple CarPlay</span>
        </li>

        <li>
            <svg class="icon">
                <use xlink:href="/themes/ubt/scss/deal-boxes/sprite.svg#icon-sat-nav"></use>
            </svg>

            <span>Sat Nav</span>
        </li>

        <li>
            <svg class="icon">
                <use xlink:href="/themes/ubt/scss/deal-boxes/sprite.svg#icon-front-rear-sensors"></use>
            </svg>

            <span>Front/rear sensors</span>
        </li>
    </ul>
    <div class="padding deal-box-button">
        <a href="{{ $deal->getUrl() }}" title="View {{ $deal->model_name }} deal" class="btn">View deal</a>
    </div>
</div>
<!-- END DEAL BOX -->