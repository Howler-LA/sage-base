@props([
  'title' => null,
  'size'  => '1',
  'tag'   => 'p'
])

@php($class = match ($size) {
  '1' => 'text-title-1 leading-title-1',
  '2' => 'text-title-2 leading-title-2',
})

<{{ $tag }} {{$attributes->class([$class,'font-bold tracking-tighter'])}}>
  {!! $title ?? $slot !!}
</{{ $tag }}>