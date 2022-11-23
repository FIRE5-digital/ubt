<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{!! $page->ulrl !!}"
  },
  "headline": "{!! $page->content->h1 !!}",
  "description": "{!! $page->content->tagline !!}",
  "image": "{!! $page->content->puff_image !!}"
}
</script>