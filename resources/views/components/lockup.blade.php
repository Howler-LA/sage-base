@props([
  'key'       => null,
  'eyebrow'   => null,
  'headline'  => null,
  'title'     => null,
  'copy'      => null,
  'links'     => null,
  'align'     => null,
])

@php($align_class = match ($align) {
  'right'   => 'text-right',
  'center'  => 'text-center max-w-screen-md mx-auto',
  default   => 'text-left',
})

<div {{ $attributes->merge(['class' => "{$align_class}"]) }}>

  @if($key)
    <x-type.key 
      class="mb-4 xl:mb-4" 
      title="{!! $key !!}" 
    />
  @endif
  
  @if($eyebrow)
    <x-type.eyebrow 
      class="mb-8 xl:mb-8" 
      title="{!! $eyebrow !!}" 
    />
  @endif

  @if($title)
    <x-type.title 
      class="mb-4" 
      title="{!! $title !!}" 
    />
  @endif

  @if($headline)
    <x-type.headline 
      class="mb-4" 
      title="{!! $headline !!}" 
    />
  @endif

  @if($copy)
    <x-type.copy 
      content="{!! $copy !!}" 
    />
  @endif

</div>