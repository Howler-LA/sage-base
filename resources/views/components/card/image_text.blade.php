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
  'padded' => 'p-xs xl:p-sm',
  default => '',
})

<article
  {{ 
    $attributes->class([
      'bg-background text-foreground',
      'flex flex-col' => $items > 1,
      'grid xl:grid-cols-3' => $items == 1,
      'rounded-lg xl:rounded-xl overflow-hidden' => $variant == 'padded'
    ]) 
  }}
>
  @if($image)
    <div 
      @class([
        'bg-foreground/75 relative',
        'xl:aspect-6/4 xl:col-span-2' => $items == 1,
        'xl:aspect-6/4' => $items >= 2,
      ])
    >
      <div class="xl:absolute inset-0">
        @image($image,'large',['class'=>'w-full h-full object-cover'])
      </div>
    </div>
  @endif
  <div
    @class([
      'flex flex-col xl:items-start gap-4',
      'justify-center xl:border-y' => $items == 1,
      $variant_class
    ])
  >
    <x-lockup
      type="card"
      eyebrow="{!! $eyebrow !!}"
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