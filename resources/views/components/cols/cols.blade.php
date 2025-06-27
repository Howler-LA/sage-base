@props([
	'contained' => null,
	'cols' 			=> null,
	'reversed' 	=> null
])

@php($contained_class = match ($contained) {
  false 	=> 'gap-y-gutter gap-x-large',
  default => 'gap-y-gutter gap-x-zero',
})

@php($cols_class = match ($cols) {
  false 	=> 'text-red-50 bg-red-400',
  default => 'xl:grid-cols-2',
})

<x-dynamic-component :component="$contained ? 'empty' : 'container'"> 
	<div class="grid grid-cols-1 {{ $cols_class }} {{ $contained_class }}">
		{{ $slot }}
	</div>
</x-dynamic-component>