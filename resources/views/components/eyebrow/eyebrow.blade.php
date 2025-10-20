@props([
  'size' => '1',
  'content' => null,
  'naked' => null
])

@php
  // Debug logging for content issues
  if (defined('WP_DEBUG') && WP_DEBUG && $content !== null && !is_string($content)) {
    error_log('Eyebrow component received non-string content: ' . gettype($content) . ' - ' . print_r($content, true));
  }
@endphp

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
    @unless($naked)
      @if(str_contains(get_bloginfo('wpurl'), 'initiatejustice'))
        <div class="h-full py-px overflow-hidden rouned-[3px] text-eyebrow-border">
          <svg class="h-full w-auto -ml-[2px] fill-eyebrow-background stroke-current" height="34" viewBox="0 0 21 34" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_4_11)">
              <path d="M18.6221 15.0215C19.9173 16.0223 19.9172 17.9777 18.6221 18.9785L0.5 32.9814V1.01758L18.6221 15.0215Z"/>
            </g>
          </svg>
        </div>
      @endif
    @endunless
  </div>
@endif
