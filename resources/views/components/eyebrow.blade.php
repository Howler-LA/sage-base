@props([
  'wrapper' => 'true',
  'content' => null
])

@php($class = match ($wrapper) {
  'true'  => 'bg-[var(--eyebrow-bg)] text-[var(--eyebrow-txt)]',
  'false' => '',
})

<div 
  {{ $attributes->class([
    $class,
    'text-eyebrow-foreground leading-eyebrow',
    'font-eyebrow',
    'tracking-wider',
    'uppercase',
    'font-medium',
    'py-min px-3 rounded' => $wrapper == "true",
  ]) }}
>
  <span>{!! $content ?? $slot !!}</span>
</div>