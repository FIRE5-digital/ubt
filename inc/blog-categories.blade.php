@php($blog=\App\Page::where('name','Blog')->first())

<h3 class="h4">Recent Posts</h3>
<ul class="layout module">
    @forelse($blog->getLatestChildrenByPublishDate()->get()->slice(0,5) as $article)
        @php($article->loadContent())
        <li><a href="{!! $article->getPath() !!}">{!! $article->content->h1 !!}</a></li>
    @empty
    @endforelse
</ul>

<h3 class="h4">Categories</h3>

<ul class="blog-categories layout module">
    @foreach($blog->getChildrenTags() as $tag => $count)
        <li><a href="/blog/?tag={{ $tag }}">{{ $tag }} <span>({{ $count }})</span></a></li>
    @endforeach
    @if(count($blog->getChildrenTags())>10)<li class="show-all"><a href="#" onclick="return all_categories(event);">Show All</a></li>@endif
</ul>
<script>
  function all_categories(e){
    e.preventDefault();
    var list;
    list = document.querySelectorAll('.blog-caetgories li');
    for (var i = 0; i < list.length; ++i) {
      list[i].classList.add('show');
    }
    document.querySelector('.show-all').remove();
  }
</script>
