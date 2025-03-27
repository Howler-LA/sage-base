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
  'solid'     => 'bg-button text-button-foreground',
  'outline'   => 'ring-2 ring-button text-button',
})

<{{ $attributes->has(['href']) ? 'a' : 'button' }} 
  {{ $attributes->class([
    $format_class,
    'inline-flex items-center justify-center',
    'font-semibold',
    '!no-underline',
    'transition ease duration-200',
    'rounded-button',
    'ring-2 ring-button bg-button text-button-foreground' => $style == 'solid',
    'hover:bg-button-foreground hover:ring-2 ring-button hover:text-button' => $style == 'solid',
    'ring-2 ring-button text-button' => $style == 'outline',
    'hover:bg-button hover:text-button-foreground' => $style == 'outline',
  ]) }}
>
  <span
    @class([
      'text-body-1 leading-[130%]' => $format == 'primary',
      'text-body-2 leading-[130%]' => $format == 'small',
    ])
  >
    {!! $label ?? $slot !!}
  </span>
</{{ $attributes->has(['href']) ? 'a' : 'button' }}>