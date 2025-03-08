@props([
  'title' => null,
  'tag'   => 'p'
])

<{{ $tag }} {{ $attributes->merge(['class'=>'text-[48px] md:text-[64px] xl:text-[72px] font-headline leading-none font-bold tracking-tighter']) }}>
  {!! $title ?? $slot !!}
</{{ $tag }}>