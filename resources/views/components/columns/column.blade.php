@props([
	'variant' => null,
	'order' 	=> null
])

<div {{ $attributes->twMerge(['group/column']) }}>
	{{ $slot }}
</div>