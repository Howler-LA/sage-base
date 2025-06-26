@props([
  'wrapper' => 'true',
  'triangle' => 'true',
  'content' => null
])

@php($class = match ($wrapper) {
  'true'  => 'bg-[var(--eyebrow-bg)] text-[var(--eyebrow-txt)]',
  'false' => '',
})

@if($slot->isNotEmpty() or $content != null)
  <div class="flex pr-4 gap-0 items-center">
    <div 
      {{ $attributes->class([
        $class,
        'font-eyebrow',
        'tracking-wider',
        'uppercase',
        'font-medium',
        'whitespace-nowrap',
        'py-min px-3 pr-0 rounded-l text-eyebrow-foreground leading-eyebrow' => $wrapper == "true",
      ]) }}
    >
      <span class="">{!! $content ?? $slot !!}</span>
    </div>
    @if($triangle == "true")
      <div class="aspect-square h-[34px] w-auto flex-none relative overflow-hidden">
        <div class="absolute inset-0">
          <div class="aspect-square size-full bg-[var(--eyebrow-bg)] rotate-45 -translate-x-1/2 rounded"></div>
        </div>
      </div>
    @endif
  </div>
@endif