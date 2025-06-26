@props([
  'size' => 'lg',
  'message' => null
])

@php($class = match ($size) {
  'xl' => 'text-pullquote-xl leading-pullquote-xl',
  'lg' => 'text-pullquote-lg leading-pullquote-lg',
  'sm' => 'text-pullquote-sm leading-pullquote-sm',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'font-pullquote',
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif