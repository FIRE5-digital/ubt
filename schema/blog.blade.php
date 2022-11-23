<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{!! $page->url !!}"
  },
  "headline": "{!! @$page->content->h1 !!}",
  "description": "{!! @$page->content->tagline !!}",
  "image": "{{ config('company.website') }}/{!! $page->content->puff_image !!}",  
  "author": {
    "@type": "Person",
    "name": "{!! @$page->content->author !!}"
  },  
  "datePublished": "{{ @$page->created_at }}"
}
</script>