@props([
  'size' => '1',
  'content' => null
])

@php($class = match ($size) {
  '1' => 'text-super-display xl:text-[152px] leading-super-display xl:leading-[135px]',
})

@if($slot->isNotEmpty() or $content != null)
  <div 
    {{ $attributes->twMerge([
      $class,
      'font-display',
      'tracking-[-3%]',
      'font-extrabold',
      'text-balance'
    ]) }}
  >
    {!! $content ?? $slot !!}
  </div>
@endif