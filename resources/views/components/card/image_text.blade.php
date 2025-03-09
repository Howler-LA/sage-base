@props([
  'items'     => 1,
  'key'       => null,
  'eyebrow'   => null,
  'headline'  => null,
  'title'     => null,
  'copy'      => null,
  'link'      => null,
])

<article
  @class([
    'flex flex-col gap-4' => $items > 1,
    'grid xl:grid-cols-3 gap-sm' => $items == 1,
  ])
>
  <div 
    @class([
      'bg-foreground/10',
      'aspect-video col-span-2' => $items == 1,
      'aspect-video' => $items >= 2,
    ])
  ></div>
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
      copy="{!! $copy !!}"
    />
    <x-button label="Call to Action" />
  </div>
</article>