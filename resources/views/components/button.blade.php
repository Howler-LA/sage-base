@props([
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
  'solid'    => 'ring-2 ring-inset ring-foreground bg-foreground text-background hover:bg-background hover:text-foreground',
  'outline'  => 'ring-2 ring-inset ring-foreground hover:bg-foreground hover:text-background',
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
</{{ $attributes->has(['href']) ? 'a' : 'button' }}>