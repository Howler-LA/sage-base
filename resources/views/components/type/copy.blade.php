@props([
  'content' => null,
  'size'    => 'body-1',
])

@php($class = match ($size) {
  'body-1'  => 'body-1 prose text-body-1 leading-body-1',
  'body-2'  => 'body-2 prose text-body-2 leading-body-2',
})

<div {{ $attributes->merge(['class' => "max-w-full text-inherit {$class}"]) }}>
  {!! $content ?? $slot !!}
</div>