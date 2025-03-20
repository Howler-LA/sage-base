@props([
  'title' => null,
  'size'  => '1',
  'tag'   => 'p'
])

@php($class = match ($size) {
  '1' => 'text-subhead leading-subhead',
})

<{{ $tag }} {{$attributes->class([$class,'font-bold tracking-tighter'])}}>
  {!! $title ?? $slot !!}
</{{ $tag }}>