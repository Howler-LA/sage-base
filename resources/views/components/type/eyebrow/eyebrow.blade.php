@props([
  'title' => null,
])

<div {{ $attributes->merge(['class'=>'inline-flex items-center h-8 overflow-hidden']) }}>
  <x-type.eyebrow.text class="bg-eyebrow text-eyebrow-foreground pl-3 rounded-l" title="{!! $title ?? $slot !!}" />
  <div class="w-0 h-0 border-24 border-solid border-transparent rounded border-l-eyebrow"></div>
</div>

{{-- <div class="inline-flex justify-center items-center">
  <span {{ $attributes->merge(['class'=>'bg-background text-foreground pl-3 pr-1 flex rounded-l-sm']) }}>
    <x-type.eyebrow.text title="{!! $title ?? $slot !!}" />
  </span>
  <div class="w-0 h-0 border-8 border-solid border-transparent border-l-background bg-pink-100">asdfs</div>
</div> --}}