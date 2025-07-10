@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-display-1 leading-display-1',
  '2' => 'text-display-2 leading-display-2',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'tracking-display',
      'font-extrabold',
      'text-balance',
      'font-display',
      str_contains(get_site_url(), 'youthjustice') ? 'uppercase' : null,
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif