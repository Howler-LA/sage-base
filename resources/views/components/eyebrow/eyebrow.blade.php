@props([
  'size' => '1',
  'content' => null,
  'naked' => null
])

@php($class = match ($size) {
  '1' => 'text-eyebrow leading-eyebrow',
})

@if($slot->isNotEmpty() or $content != null)
  <div class="flex items-center">
    <x-dynamic-component class="flex-none" :component="$naked ? 'empty' : 'eyebrow.wrapper' ">
      <div 
        {{ $attributes->twMerge([
          $class,
          'whitespace-nowrap',
          'font-eyebrow',
          'font-extrabold',
          'tracking-eyebrow',
          'font-[var(--font-weight-eyebrow)]',
          'uppercase',
        ]) }}
      >
        {!! $content ?? $slot !!}
      </div>
    </x-dynamic-component>
    @if(str_contains(get_bloginfo('wpurl'), 'initiatejustice'))
      <svg class="h-full w-auto flex-none" viewBox="0 0 21 34" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.9279 14.6261C20.4822 15.8271 20.4822 18.1729 18.928 19.3739L4.21161e-07 34L1.90735e-06 -9.6165e-07L18.9279 14.6261Z" fill="#FFCC02"/>
      </svg>
    @endif
  </div>
@endif
