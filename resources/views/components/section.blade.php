@props([
  'tag' => 'section',
  'padding' => null,
])

@php($class = match ($padding) {
  'xl'    => 'py-xl',
  default => 'py-lg',
})

<section
  {{ $attributes->class([
    get_row_layout(),
    'bg-background text-foreground',
    $class,
  ]) }}
>
  {!! $slot !!}
</section>

