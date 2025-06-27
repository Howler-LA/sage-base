@props([
  'columns' => null,
  'message' => null,
  'gutter'  => null,
])

@php($gutter_class = match ($gutter) {
  'xl'    => 'gap-y-gutter gap-x-x-large',
  'lg'    => 'gap-y-gutter gap-x-large',
  'zero'  => 'gap-y-gutter gap-x-zero',
  default => 'gap-gutter',
})

@php($class = match ($columns) {
  '3' 		=> 'lg:grid-cols-3',
  '2' 		=> 'lg:grid-cols-2',
  default => 'lg:grid-cols-2',
})

<div {{ $attributes->twMerge(['grid grid-cols-1',$class, $gutter_class]) }}>
	{{ $slot }}
</div>