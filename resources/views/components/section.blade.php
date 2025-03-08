@props([
  'tag' => 'section',
])

<{{$tag}} {{ $attributes->merge(['class' => "py-sm md:pt-md xl:py-lg bg-background text-foreground"]) }}>
  {!! $slot !!}
</{{$tag}}>