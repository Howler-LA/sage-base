@props([
  'label'   => null,
  'icon'    => null,
  'tag'     => 'button',
  'format'  => 'primary',
  'style'   => 'solid',
])

@php($format_class = match ($format) {
  'primary'  => 'px-[calc((var(--button-padding-horiz-l))*1px)] py-[calc((var(--button-padding-vert-l))*1px)]',
  'small'    => 'px-[calc((var(--button-padding-horiz-s))*1px)] py-[calc((var(--button-padding-vert-s))*1px)]',
})

@php($style_class = match ($style) {
  'solid'     => 'bg-[var(--button-color-btn-bg)] text-[var(--button-color-btn-txt)]',
  'outline'   => 'ring-2 ring-[var(--button-color-btn-bg)] text-[var(--button-color-btn-bg)]',
})

<{{ $attributes->has(['href']) ? 'a' : 'button' }} 
  {{ $attributes->class([
    $format_class,
    'inline-flex items-center justify-center',
    'font-semibold',
    '!no-underline',
    'transition ease duration-200',
    'rounded-[calc((var(--button-radius))*1px)]',
    'ring-2 ring-[var(--button-color-btn-bg)] bg-[var(--button-color-btn-bg)] text-[var(--button-color-btn-txt)]' => $style == 'solid',
    'hover:bg-[var(--button-color-btn-txt)] hover:ring-2 ring-[var(--button-color-btn-bg)] hover:text-[var(--button-color-btn-bg)]' => $style == 'solid',
    'ring-2 ring-[var(--button-color-btn-bg)] text-[var(--button-color-btn-bg)]' => $style == 'outline',
    'hover:bg-[var(--button-color-btn-bg)] hover:text-[var(--button-color-btn-txt)]' => $style == 'outline',
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