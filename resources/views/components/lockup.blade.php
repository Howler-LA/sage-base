@props([
  'key'       => null,
  'eyebrow'   => null,
  'headline'  => null,
  'subhead'   => null,
  'title'     => null,
  'copy'      => null,
  'links'     => null,
  'align'     => null,
  'type'      => null,
])

@php($align_class = match ($align) {
  'right'   => 'text-right',
  'center'  => 'text-center max-w-screen-md mx-auto',
  default   => 'text-left',
})

<div 
  data-aos="fade-in"
  {{ $attributes->merge(['class' => "{$align_class}"]) }}
>

  @if($key)
    <x-type.key 
      @class([
        'mb-4' => $type == null,
        'mb-2' => $type == 'card',
      ])
      title="{!! $key !!}" 
    />
  @endif
  
  @if($eyebrow)
    <x-type.eyebrow 
      @class([
        'mb-8 xl:mb-8' => $type == null,
        'mb-4 xl:mb-4' => $type == 'card',
      ])
      title="{!! $eyebrow !!}" 
    />
  @endif

  @if($subhead)
    <x-type.subhead 
      @class([
        'mb-8' => $type == null,
        'mb-4' => $type == 'card',
      ])
      size="1"
      title="{!! $subhead !!}" 
    />
  @endif

  @if($title)
    <x-type.title 
      @class([
        'mb-8' => $type == null,
        'mb-4' => $type == 'card',
      ])
      title="{!! $title !!}" 
    />
  @endif

  @if($headline)
    <x-type.display 
      @class([
        'mb-4'
      ])
      title="{!! $headline !!}" 
    />
  @endif

  @if($copy)
    <x-type.copy 
      content="{!! $copy !!}" 
    />
  @endif

</div>