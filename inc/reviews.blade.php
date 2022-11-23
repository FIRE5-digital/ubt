
@php($reviews = (new \App\Reviews)->getLatest())

<div class="review-summary">
    <h3>Stable Vehicle Contract Reviews</h3>
    <p><span class="bold">{{ $reviews->stats->average_rating }}</span> out of 5 from <span class="bold">{{ $reviews->stats->total_reviews }}</span> Reviews</p>
    <div class="review-stars">
        <div class="stars-ctr" style="width:{{ $reviews->stats->average_rating * 2 * 10 }}%"></div>
    </div>
</div>

<div class="reviews-ctr"> 
    @foreach($reviews->reviews as $review)
    @if($loop->index>3) @continue @endif
    <div class="review">
        <div class="review-name">
            <h4>{{ $review->reviewer->first_name }} {{ $review->reviewer->last_name }} 
                <span class="review-stars">
                    <span class="stars-ctr" style="width:{{ $review->rating * 2 * 10 }}%"> {{ $review->rating }} Stars</span>
                </span>
            </h4>
            <p>{{ $review->comments }}</p>
        </div>
        <div class="review-date">{{ $review->date }}</div>
    </div>
    @endforeach
</div>
