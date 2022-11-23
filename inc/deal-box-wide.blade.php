<!-- components/deal-box.scss -> components/deal-box/_horizontal-twoprices-details.scss -->

<div class="deal-box-wide">
    <div class="deal-box-img">
        <div class="deal-box-flags">
            <span class="deal-box-offer">
                Ideal Offer
            </span>
            @if($deal->in_stock)
            <span class="deal-box-stock">
                In stock for fast delivery
            </span>
            @endif
        </div>
        <a href="{{ $deal->getUrl() }}" title="View {{ $deal->model_name }} deal">
            <img src="{{ $deal->getMainImage('large') }}" alt="{{ $deal->short_name }}">
        </a>
    </div>
    <div class="deal-box-info">
        <div class="deal-box-content">
            <div class="deal-box-content-ctr">
                <div class="deal-box-heading">
                    <h3>{{ $deal->model_name }}</h3>
                    <p>{{ $deal->name }}</p>
                </div>
                <div class="deal-box-controls">
                    {{-- <a href="#" data-content="Compare This Vechicle"><img src="/themes/ubt/img/icons/plus.svg" alt="Compare This Vechicle"></a> --}}
                    <a href="/search{{ $deal->getSearchParams() }}" data-content="Search For More Like This"><img src="/themes/ubt/img/icons/search.svg" alt="Search For More Like This"></a>
                </div>
            </div>
            <div class="deal-box-spec">
                <ul>
                    <li>
                        <span>
                            <img src="/themes/ubt/img/icons/manual.svg" alt="Gear Type">
                            <h4>{{ $deal->transmission }}</h4>
                        </span>
                    </li>
                    <li>
                        <span>
                            <img src="/themes/ubt/img/icons/diesel.svg" alt="Gear Type">
                            <h4>{{ $deal->fuel_type }}</h4>
                        </span>
                    </li>
                    <li>
                        <span>
                            <img src="/themes/ubt/img/icons/speedometer.svg" alt="Fuel Efficiency">
                            <h4>{{ $deal->mpg_combined }}mpg</h4>
                        </span>
                    </li>
                    <li>
                        <span>
                            <img src="/themes/ubt/img/icons/stop-watch.svg" alt="Top Speed">
                            <h4>{{ $deal->top_speed }}mph</h4>
                        </span>
                    </li>
                    <li>
                        <span>
                            <img src="/themes/ubt/img/icons/environment.svg" alt="C02 Emissions">
                            <h4>{{ $deal->co2 }}g/km</h4>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="deal-box-prices">
            @if($deal->type=='car')
            <div class="deal-box-price deal-box-personal">
                <div class="deal-box-price-ctr">
                    <p>Personal Price</p>
                    <span>{{ $deal->getFromPrice('Personal', true) }}</span>
                </div>
            </div>
            @endif
            <div class="deal-box-price deal-box-business">
                <div class="deal-box-price-ctr">
                    <p>Business Price</p>
                    <span>{{ $deal->getFromPrice('Business - Contract Hire', true) }}</span>
                </div>
            </div>
        </div>
        <div class="deal-box-button">
            <a class="button" href="{{ $deal->getUrl() }}" title="View {{ $deal->model_name }} deal"><span>View Deal</span></a>
        </div>
    </div>
</div><!--deal-box-->