<section class="manufacturer-strip">
    <div class="ctr">
        <div class="manufacturer-strip-intro">
            <h3 class="h2">{!! @$page->content->manufacturer_intro_heading !!}</h3>
            <p>{!! @$page->content->manufacturer_intro_tagline !!}</p>
        </div>
        <div class="manufacturer-strip-ctr">
            @forelse($manufacturers = \App\CarManufacturer::orderByRaw('popular desc, RAND()')->take(8)->get() as $make)
            <div class="manufacturer">
                <a href="{{ $make->getURL() }}">
                    <img src="/themes/ubt/img/manufacturer/{{ friendlyClass($make->name) }}.png" alt="{{ $make->name }}" width="" height="">
                </a>
            </div><!--manufacturer-->
            @empty
            @endforelse
            
        </div>
        <p><a href="/car-leasing/manufacturers" class="btn button">View All</a></p>
    </div>
</section><!--manufacturer-strip-->