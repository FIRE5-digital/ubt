<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AutoRental",
  "name": "{{ config('company.name') }}",
  "logo": "{{ config('company.website').'/'.config('company.company_logo') }}",
  "image": "{{ config('company.website').'/'.config('company.company_logo') }}",
  "url": "{{ config('company.website') }}",
  "telephone": "{{ config('company.telephone') }}",
  "priceRange": "££££",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "{{ config('company.address') }}"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday"
    ],
    "opens": "09:00",
    "closes": "17:00"
  }

}
</script>