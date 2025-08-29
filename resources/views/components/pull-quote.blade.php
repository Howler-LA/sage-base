@props([
  'size'    => 'lg',
  'message' => null
])

@php($class = match ($size) {
  'sm' => 'text-pull-quote-sm leading-pull-quote-sm tracking-pull-quote-sm',
  'lg' => 'text-pull-quote-lg leading-pull-quote-lg tracking-pull-quote-lg',
  'xl' => 'text-pull-quote-xl leading-pull-quote-xl tracking-pull-quote-xl',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'text-balance',
      'font-pull-quote',
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif