@props([
  'size' => '1',
  'message' => null
])

@php($class = match ($size) {
  '1' => 'text-body-1 leading-body-1 prose prose-lg lg:prose-xl',
  '2' => 'text-body-2 leading-body-2 prose prose-lg',
})

@if($slot->isNotEmpty() or $message != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'font-body',
      'tracking-body',
      'text-balance',
      'font-medium',
      'text-foreground prose-headings:text-foreground prose-a:text-foreground'
    ]) }}
  >
    {!! $message ?? $slot !!}
  </div>
@endif