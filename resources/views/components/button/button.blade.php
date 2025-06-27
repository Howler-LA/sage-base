@props([
	'label' => null,
	'variant' => null,
	'size' => null
])

@php($variant_class = match ($variant) {
  'success' => 'text-green-50 bg-green-400',
  'link'    => 'inline-flex rounded-full text-foreground hover:bg-foreground/5 !px-5',
  'outline' => 'bg-btn-background-hover hover:bg-btn-background text-btn-foreground-hover hover:text-btn-foreground ring-1 ring-btn-border rounded-full',
  default 	=> 'bg-btn-background text-btn-foreground hover:bg-btn-background-hover hover:text-btn-foreground-hover ring-1 ring-btn-border rounded-full',
})

@php($size_class = match ($size) {
  'success' => 'text-green-50 bg-green-400',
  'caution' => 'text-yellow-50 bg-yellow-400',
  'sm' 			=> 'leading-10 px-4',
  default 	=> 'leading-12 px-6',
})

<{{ $attributes->has(['href']) ? 'a' : 'button' }}  
	{{ $attributes->twMerge(['font-[var(--button-weight)] tracking-button transition-colors text-button font-button',$variant_class,$size_class]) }}
>
	{!! $label ?? $slot !!}
</{{ $attributes->has(['href']) ? 'a' : 'button' }}>