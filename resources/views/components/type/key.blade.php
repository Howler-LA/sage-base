@props([
  'title' => null,
])

<x-type.eyebrow.text {{ $attributes->merge(['class'=>'font-light inline-block']) }}>
  {{ $title }}
</x-type.eyebrow.text>
