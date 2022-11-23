<h3 class="h5">Car Leasing Guides</h3>
<ul>
@php($guide=\App\Page::where('name','Leasing Guides')->first())    
@php($articles = $guide->getChildren())
@forelse($articles->get() as $article)
@php($article->loadContent())
<li><a href="{!! $article->getPath() !!}">{{ $article->name }}</a></li>
@empty
    <li>We couldn't find any articles</li>
@endforelse
</ul>