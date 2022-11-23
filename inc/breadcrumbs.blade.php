<!-- BREADCRUMBS --> 
<div class="breadcrumbs">
    <div class="ctr"> 
        <ul class="layout inline-list" aria-labelledby="breadcrumbMenu">
            @foreach($page->breadcrumbs() as $breadcrumb)
            <li><a href="{{ $breadcrumb->path }}">{{ $breadcrumb->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- END BREADCRUMBS -->