@props([
  'title' => null,
])

<div {{ $attributes->merge(['class'=>'inline-flex items-center relative overflow-hidden pr-5']) }}>
  <div class="size-10 rounded bg-eyebrow rotate-45 flex-none absolute right-2"></div>
  <x-type.eyebrow.text class="bg-eyebrow inline-flex h-10 items-center text-eyebrow-foreground pl-3 pr-1 rounded-l relative" title="{!! $title ?? $slot !!}" />
</div>

{{-- <div class="inline-flex justify-center items-center">
  <span {{ $attributes->merge(['class'=>'bg-background text-foreground pl-3 pr-1 flex rounded-l-sm']) }}>
    <x-type.eyebrow.text title="{!! $title ?? $slot !!}" />
  </span>
  <div class="w-0 h-0 border-8 border-solid border-transparent border-l-background bg-pink-100">asdfs</div>
</div> --}}