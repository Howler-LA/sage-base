@props([
  'items'     => 1,
  'key'       => null,
  'eyebrow'   => null,
  'headline'  => null,
  'subhead'   => null,
  'title'     => null,
  'copy'      => null,
  'link'      => null,
  'image'     => null,
  'variant'   => null,
])

@php($variant_class = match ($variant) {
  'success' => 'text-green-50 bg-green-400',
  'caution' => 'text-yellow-50 bg-yellow-400',
  'padded' => 'p-xs xl:p-sm rounded-lg xl:rounded-xl',
  default => '',
})

<article
  {{ 
    $attributes->class([
      'bg-background text-foreground',
      'flex flex-col gap-4' => $items > 1,
      'grid xl:grid-cols-3 gap-sm' => $items == 1,
      $variant_class
    ]) 
  }}
>
  @if($image)
    <div 
      @class([
        'bg-foreground',
        'aspect-video col-span-2' => $items == 1,
        'aspect-video' => $items >= 2,
      ])
    ></div>
  @endif
  <div
    @class([
      'flex flex-col items-start gap-4',
      'justify-center border-y' => $items == 1,
    ])
  >
    <x-lockup
      type="card"
      key="{!! $key !!}"
      title="{!! $title !!}"
      subhead="{!! $subhead !!}"
      copy="{!! $copy !!}"
    />
    <x-button 
      style="{{ $variant == 'padded' ? 'outline' : 'solid' }}"
      label="Call to Action" 
    />
  </div>
</article>