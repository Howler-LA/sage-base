@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-eyebrow leading-eyebrow',
})

@if($slot->isNotEmpty() or $content != null)
  <x-eyebrow.wrapper>
    <div 
      {{ $attributes->twMerge([
        $class,
        'font-eyebrow',
        'font-extrabold',
        'tracking-eyebrow',
        'font-[var(--font-weight-eyebrow)]',
        'uppercase',
      ]) }}
    >
      {!! $content ?? $slot !!}
    </div>
  </x-eyebrow.wrapper>
@endif