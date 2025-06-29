@props([
	'contained' => false,
	'cols' 			=> null,
	'reversed' 	=> null,
	'center'		=> null,
])

@php($contained_class = match ($contained) {
  false 	=> 'gap-y-gutter gap-x-zero',
  default => 'gap-y-gutter gap-x-large',
})

@php($cols_class = match ($cols) {
  '3' 		=> 'xl:grid-cols-3',
  default => 'xl:grid-cols-2',
})

<x-dynamic-component :component="$contained ? 'container' : 'empty'"> 
	<div class="grid grid-cols-1 {{ $cols_class }} {{ $contained_class }} {{ $center ? 'items-center' : 'items-start' }}">
		{{ $slot }}
	</div>
</x-dynamic-component>