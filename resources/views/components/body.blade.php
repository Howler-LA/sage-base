@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-body-1 leading-body-1',
  '2' => 'text-body-2 leading-body-2',
})

@if($slot->isNotEmpty() or $content != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'text-balance'
    ]) }}
  >
    {!! $content ?? $slot !!}
  </div>
@endif