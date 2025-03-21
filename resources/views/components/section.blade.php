@props([
  'tag' => 'section',
  'padding' => null
])

@php($class = match ($padding) {
  '3xl'   => 'py-lg md:py-xl xl:py-2xl 2xl:py-3xl',
  '2xl'   => 'py-md md:py-lg xl:py-xl 2xl:py-2xl',
  'xl'    => 'py-sm md:py-md xl:py-lg 2xl:py-xl',
  default => 'py-sm md:py-md xl:py-lg',
})

@set($block_type,get_row_layout())

<{{$tag}} {{ $attributes->merge(['class' => "bg-background text-foreground relative {$block_type} {$class}"]) }}>
  {!! $slot !!}
</{{$tag}}>