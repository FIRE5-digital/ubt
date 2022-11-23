@if($latest_offers->count())
<section class="latest-offers-strip">
    <div class="ctr">
        <div class="latest-offer-intro">
            <div>
                <h3 class="h1">{{ @$page->content->latest_deals_heading ?? 'Latest Offers' }}</h3>
                <p>{{ @$page->content->latest_deals_tagline }}</p>
            </div>
        </div>
        <div class="latest-offers-strip-ctr deal-boxes three-column no-features no-similar-offers">
            @foreach($latest_offers as $deal)
                @include('themes.ubt.inc.deal-box')
            @endforeach
        </div>
        <div class="more-offers">
            <a href="/special-offers" class="btn">View More Offers</a>
        </div>
    </div>
</section><!--deals-->
@endif