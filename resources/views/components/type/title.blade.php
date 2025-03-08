@props([
  'title' => null,
  'size'  => '1'
])

@php($class = match ($size) {
  '2' => 'text-[24px] sm:text-[28px] xl:text-[32px]',
  '1' => 'text-[24px] sm:text-[28px] xl:text-[32px]',
})

<div {{ $attributes->merge(['class'=>"font-headline leading-tight font-extrabold tracking-tight {$class}"]) }}>
  {!! $title ?? $slot !!}
</div>