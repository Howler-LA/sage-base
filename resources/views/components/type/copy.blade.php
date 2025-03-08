@props([
  'content' => null,
  'size'    => 'body-1',
])

@php($class = match ($size) {
  'body-1'  => 'text-[17px] xl:text-[20px]',
  'body-2'  => 'text-[15px] xl:text-base',
})

<div {{ $attributes->merge(['class' => "font-body {$class}"]) }}>
  {!! $content ?? $slot !!}
</div>