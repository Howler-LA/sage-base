@props([
	'variant' => 'color-card'
])

@php($class = match ($variant) {
  'news-card' 	=> 'rounded-card bg-news-card-background hover:bg-news-card-background-hover active:news-card-background-active',
  'color-card' 	=> 'rounded-card bg-color-card-background hover:bg-color-card-background-hover active:color-card-background-active',
  'image-card' 	=> 'rounded-card bg-color-card-background hover:bg-color-card-background-hover active:color-card-background-active',
})

<div {{ $attributes->twMerge([$class,'overflow-hidden']) }}>
	{{ $slot }}
</div>