@props([
	'label' => null,
	'variant' => null,
	'size' => null,
  'icon' => null,
  'state' => null,
])

@php($state_class = match ($state) {
  'active' => 'ring-2 ring-inset ring-btn-background/40',
  default   => '',
})

@php($variant_class = match ($variant) {
  'success' => 'text-green-50 bg-green-400',
  'link'    => 'inline-flex rounded-full text-foreground hover:bg-btn-background/10 !px-5',
  'outline' => 'bg-transparent hover:bg-btn-background text-btn-foreground-hover hover:text-btn-foreground ring-1 ring-btn-border rounded-full',
  default 	=> 'bg-btn-background text-btn-foreground hover:bg-btn-background-hover hover:text-btn-foreground-hover ring-1 ring-btn-border rounded-full',
})

@php($size_class = match ($size) {
  'sm' 			=> 'leading-10 h-10 px-4',
  default 	=> 'leading-12 h-12 px-6',
})

<{{ $attributes->has(['href']) ? 'a' : 'button' }}  
	{{ $attributes->twMerge([
    'font-[var(--button-weight)] gap-1 inline-flex items-center tracking-button ease duration-300 transition-colors font-button',
    $variant_class,
    $size_class,
    $state_class,
  ]) }}
>
  <span class="{{ $size == 'sm' ? 'text-body-2' : 'text-body-1' }}">
	 {!! $label ?? $slot !!}
  </span>

  @if($icon)
    <x-dynamic-component :component="$icon" class="translate-y-px size-5 stroke-3 transition duration-300 ease group-hover:rotate-180" /> 
  @endif

</{{ $attributes->has(['href']) ? 'a' : 'button' }}>