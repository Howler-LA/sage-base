@props([
	'variant' => null
])

@php($variant_class = match ($variant) {
  'contained' => 'w-full px-med xl:max-w-browser-half',
  default => '',
})

<div
	@class([
		'group/column',
		'flex flex-col h-full',
		'items-end' => $variant == 'contained',
	])
>
	<div {{ $attributes->twMerge([$variant_class]) }}>
		{{ $slot }}
	</div>
</div>