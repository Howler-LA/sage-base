@props([
  'columns' => null,
  'message' => null,
])

@php($class = match ($columns) {
  '3' 		=> 'lg:grid-cols-3',
  '2' 		=> 'lg:grid-cols-2',
  default => 'lg:grid-cols-2',
})

<div {{ $attributes->twMerge(['grid grid-cols-1 gap-gutter',$class]) }}>
	{{ $slot }}
</div>