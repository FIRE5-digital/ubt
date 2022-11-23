<section class="blog-list-strip">
    <div class="ctr">
        <div class="blog-list-strip-intro">
            <div>
                <h1>{!! @$page->content->global->guides_heading !!}</h1>
                <p>{!! @$page->content->global->guides_tagline!!}</p>
            </div>
        </div>
    </div>
    <div class="blog-list">

        @php($guide=\App\Page::where('name','guides')->first())
        @forelse($guide->getChildren->slice(0,4) as $article)
            @php($article->loadContent())
            <div class="blog-item">
                <a href="{!! $article->getPath() !!}">
                    <div class="blog-item-img">
                        <picture>
                            <img src="{!! $article->content->puff_image !!}" alt="{!! $article->content->h1 !!}" width="480" height="430">
                        </picture>
                    </div>
                    <div class="blog-item-content">
                        <div class="blog-item-content-ctr">
                            <h3>{!! $article->content->h1 !!}</h3>
                            <p>{!! $article->content->tagline !!}</p>
                        </div>
                    </div>
                    <div class="blog-item-icon">
                    </div>
                </a>
            </div>

        @empty
            <p>There are no articles at this time</p>
        @endforelse

    </div>
</section>