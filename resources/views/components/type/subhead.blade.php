@props([
  'title' => null,
])

<div {{ $attributes->merge(['class'=>"font-headline leading-tight font-extrabold tracking-tight text-[32] sm:text-[40px] xl:text-[48px]"]) }}>
  {!! $title ?? $slot !!}
</div>