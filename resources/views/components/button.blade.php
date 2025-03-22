@props([
  'label'   => null,
  'icon'    => null,
  'tag'     => 'button',
  'format'  => 'primary',
  'size'    => 'lg',
  'style'   => 'solid',
])

<{{ $attributes->has(['href']) ? 'a' : 'button' }} 
  {{ $attributes->class([
    'inline-flex items-center justify-center',
    'bg-[var(--button-color-btn-bg)] text-[var(--button-color-btn-txt)]',
    'font-semibold',
    '!no-underline',
    'px-[calc((var(--button-padding-horiz-l))*1px)]'  => $size == 'lg',
    'py-[calc((var(--button-padding-vert-l))*1px)]'   => $size == 'lg',
    'px-[calc((var(--button-padding-horiz-s))*1px)]'  => $size == 'sm',
    'py-[calc((var(--button-padding-vert-s))*1px)]'   => $size == 'sm',
    'rounded-[calc((var(--button-radius))*1px)]',
  ]) }}
>
  <span
    @class([
      'text-body-1 leading-[130%]' => $size == 'lg',
      'text-body-2 leading-[130%]' => $size == 'sm',
    ])
  >
    {!! $label ?? $slot !!}
  </span>
</{{ $attributes->has(['href']) ? 'a' : 'button' }}>

{{-- @props([
  'label'   => null,
  'icon'    => null,
  'tag'     => 'button',
  'format'  => 'primary',
  'style'   => 'solid',
])

@php($format_class = match ($format) {
  'primary'  => '',
})

@php($style_class = match ($style) {
  'solid'    => 'ring-1 ring-inset ring-button-border bg-button text-button-foreground hover:bg-button-hover hover:text-button-foreground-hover active:bg-button-active',
  'outline'  => 'ring-1 ring-inset ring-btn-background hover:bg-btn-background hover:text-btn-foreground',
})

<{{ $attributes->has(['href']) ? 'a' : 'button' }}
  {{ 
    $attributes->class([
      'font-button',
      'text font-semibold leading-10',
      'inline-flex gap-2 items-center !no-underline',
      'items-center justify-center',
      'transition ease duration-100',
      'rounded-full',
      'py-1 px-5' => $icon == '', 'pl-5 pr-4' => $icon,
      $format_class,
      $style_class,
    ]) 
  }}
>
  <span>{!! $label ?? $slot !!}</span>
  @if($icon)<x-lucide-arrow-right />@endif
</{{ $attributes->has(['href']) ? 'a' : 'button' }}> --}}