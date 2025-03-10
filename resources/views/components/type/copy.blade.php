@props([
  'content' => null,
  'size'    => 'body-1',
])

@php($class = match ($size) {
  'body-1'  => 'prose prose-lg xl:prose-xl leading-relaxed xl:leading-relaxed',
  'body-2'  => 'prose',
})

<div {{ $attributes->merge(['class' => "font-body max-w-full text-inherit {$class}"]) }}>
  {!! $content ?? $slot !!}
</div>