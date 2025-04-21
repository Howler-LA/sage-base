@props([
  'tag' => 'section',
  'padding' => null,
])

@php($class = match ($padding) {
  'xl'    => 'py-xl',
  default => 'py-lg',
})

<section
  {{-- id="{{ str_replace(' ', '-', strtolower(get_sub_field('content')['headline'])) }}" --}}
  {{ $attributes->class([
    get_row_layout(),
    'bg-background text-foreground',
    $class,
  ]) }}
>
  {!! $slot !!}
</section>

