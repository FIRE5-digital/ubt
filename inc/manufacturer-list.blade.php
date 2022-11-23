
@if(!isset($manufacturers))
@php($manufacturers=\App\CarManufacturer::where('popular',1)->get()->all()) 
@endif

@foreach($manufacturers as $m)
<div class="manufacturer">
    <a href="/car-leasing/{{ $m->url }}">
        <img src="{{ empty($m->logo) ? '/themes/ubt/img/manufacturer/'.$m->url.'.png' : \Image::url(\Config::get('app.upload_path').'/'.@$m->logo,150,150) }}" alt="{{ $m->name }}">
    </a>
</div><!--manufacturer-->
@endforeach