@props([
  'title' => null,
])

<x-type.eyebrow.text {{ $attributes->merge(['class'=>'font-light text-sm inline-block font-key']) }}>
  {{ $title }}
</x-type.eyebrow.text>
