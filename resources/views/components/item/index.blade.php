@props([
	'variant' => null,
	'layout' 	=> null,
])

@php($variant_class = match ($variant) {
	'color-card' 			=> 'bg-color-card-background hover:bg-color-card-background-hover',
	'news-card' 			=> 'bg-news-card-background hover:bg-news-card-background-hover',
	'accordion-card' 	=> 'py-md first:pt-0 bg-background text-foreground border-b',
  'featured' 				=> 'grid xl:grid-cols-2 xl:col-span-full',
  default 					=> 'bg-background text-foreground rounded-lg overflow-hidden',
})

@php($layout_class = match ($layout) {
  'featured' 		=> 'grid xl:grid-cols-2 xl:col-span-full',
  default 			=> 'flex flex-col',
})

<div {{ $attributes->twMerge([$variant_class, $layout_class]) }}>
	{!! $slot !!}
</div>