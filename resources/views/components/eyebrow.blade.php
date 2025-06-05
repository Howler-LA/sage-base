@props([
  'wrapper' => 'true',
  'content' => null
])

@php($class = match ($wrapper) {
  'true'  => 'bg-[var(--eyebrow-bg)] text-[var(--eyebrow-txt)]',
  'false' => '',
})

@if($slot->isNotEmpty() or $content != null)
  <div 
    {{ $attributes->class([
      $class,
      'font-eyebrow',
      'tracking-wider',
      'uppercase',
      'font-medium',
      'py-min px-3 rounded text-eyebrow-foreground leading-eyebrow' => $wrapper == "true",
    ]) }}
  >
    <span>{!! $content ?? $slot !!}</span>
  </div>
@endif