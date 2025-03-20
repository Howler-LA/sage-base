@props([
  'title' => null,
  'size'  => '1',
  'tag'   => 'p'
])

@php($class = match ($size) {
  '1' => 'text-super leading-super',
  '2' => 'text-super leading-super',
})

<{{ $tag }} {{$attributes->class([$class,'font-headline font-bold tracking-tighter'])}}>
  {!! $title ?? $slot !!}
</{{ $tag }}>