@props([
  'title' => null,
])

<div class="inline-flex">
  <span {{ $attributes->merge(['class'=>'bg-eyebrow-bg text-eyebrow-text pl-3 pr-1 inline-block rounded-l-sm']) }}>
    <x-type.eyebrow.text title="{!! $title ?? $slot !!}" />
  </span>
  <div class="w-4 h-8 pr-1 bg-background flex items-center justify-end overflow-hidden">
    <div class="size-6 bg-eyebrow-bg rotate-45 flex-none rounded-sm"></div>
  </div>
</div>