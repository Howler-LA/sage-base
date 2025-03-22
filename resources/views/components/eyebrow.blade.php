@props([
  'wrapper' => 'true',
  'content' => null
])

@php($class = match ($wrapper) {
  'true'  => 'bg-[var(--eyebrow-bg)] text-[var(--eyebrow-txt)]',
  'false' => 'text-[var(--eyebrow-txt)]',
})

<div 
  {{ $attributes->class([
    $class,
    'text-[calc((var(--font-size-eyebrow))*1px)] leading-[calc((var(--line-height-eyebrow))*1px)]',
    'font-eyebrow',
    'uppercase',
    'font-semibold',
    'py-[calc((var(--spacing-min))*1px)] pl-3 rounded-l' => $wrapper == "true",
  ]) }}
>
  {!! $content ?? $slot !!}
</div>