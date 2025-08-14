@props([
  'size' => '1',
  'message' => null,
  'html' => 'div'
])

@php($class = match ($size) {
  '1' => 'text-super-display leading-super-display',
})

@if($slot->isNotEmpty() or $message != null)
  <{{ $html }} 
    {{ $attributes->twMerge([
      $class,
      'font-display',
      'tracking-[-4%]',
      'font-extrabold',
      'text-balance',
      str_contains(get_site_url(), 'youthjustice') ? 'uppercase' : null,
    ]) }}
  >
    {!! $message ?? $slot !!}
  </{{ $html }}>
@endif