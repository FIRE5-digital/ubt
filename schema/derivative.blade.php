<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "{{ $derivative->range_name }} {{ $derivative->name }}",
  "description": "{{ @$derivative->meta_description }}",
  "image": [
    @forelse($derivative->getImages as $img)
      {{ $img->url }}">
    @empty
    @endforelse
   ],
  "sku": "{{ $derivative->sku }}",
  "brand": {
    "@type": "Thing",
    "name": "{{ $derivative->range_name }}"
    "mainEntityOfPage": "https://schema.org/Manufacturer"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "GBP",
    "price": "{{ $derivative->price }}",
    "availability": "http://schema.org/InStock",
    "itemCondition": "http://schema.org/NewCondition"
  }
}
</script>