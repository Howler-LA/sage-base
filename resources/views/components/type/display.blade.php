@props([
  'title' => null,
  'size'  => '1',
  'tag'   => 'p'
])

@php($class = match ($size) {
  '1' => 'text-display leading-display',
  '2' => 'text-display leading-display',
})

<{{ $tag }} {{$attributes->class([$class,'font-headline font-bold tracking-tight'])}}>
  {!! $title ?? $slot !!}
</{{ $tag }}>