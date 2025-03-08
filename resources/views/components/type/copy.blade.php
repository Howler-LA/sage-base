@props([
  'content' => null,
  'size'    => 'body-1',
])

@php($class = match ($size) {
  'body-1'  => 'text-base sm:text-[17px] xl:text-[20px]',
  'body-2'  => 'text-sm sm:text-[15px] xl:text-base',
})

<div {{ $attributes->merge(['class' => "font-body opacity-80 {$class}"]) }}>
  {!! $content ?? $slot !!}
</div>