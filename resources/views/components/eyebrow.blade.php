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
    'text-[calc((var(--font-size-eyebrow))*1px)] leading-[calc((var(--line-height-eyebrow))*1px)]',
    'font-eyebrow',
    'tracking-wider',
    'uppercase',
    'font-medium',
    'py-[calc((var(--spacing-min))*1px)] px-3 rounded' => $wrapper == "true",
  ]) }}
>
  <span>{!! $content ?? $slot !!}</span>
</div>