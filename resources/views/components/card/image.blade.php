@props([
  'parent'    => null,
  'items'     => 1,
  'key'       => null,
  'eyebrow'   => null,
  'headline'  => null,
  'subhead'   => null,
  'title'     => null,
  'copy'      => null,
  'link'      => null,
  'links'     => null,
  'image'     => null,
  'variant'   => null,
  'featured'  => null,
  'columns'   => null,
])

<x-card 
  @class([
    // 'border border-foreground/50' => $config['block']['theme'] === $config['cards']['theme'],
    'col-span-full' => $featured,
    'grid xl:grid-cols-3 gap-gutters' => $items == 1 || $featured,
    'space-y-gutters' => $items > 1 && !$featured,
    'border-b last:border-0 border-foreground/50 py-card-padding first:pt-0 last:pb-0' => $parent === 'block__sticky_content',
  ])
>
  @if($image)
    <div @class([ 'xl:col-span-2' => $items == 1 || $featured ])>
      @image($image,'large',['class'=>'w-full h-auto block'])
    </div>
  @endif
  <div
    @class([
      'xl:py-card-padding xl:justify-center xl:border-y' => $items == 1 || $featured,
      'flex flex-col items-start',
      'gap-em',
    ])
  > 
    <x-eyebrow wrapper="false" content="{{ $eyebrow }}" />
    <header class="space-y-em">
      <x-title size="1" content="{{ $title }}" />
      <x-body size="{{ $columns >= 4 ? '2' : '1' }}" content="{!! $copy !!}" />
    </header>
    @if($links)
      <div class="flex flex-col xl:flex-row gap-min">
        @foreach(json_decode($links, true) as $link)
          <x-button
            style="{{ $link['config']['style'] }}"
            format="{{ $link['config']['format'] }}"
            href="{{ $link['link']['url'] }}"
            label="{{ $link['link']['title'] }}" 
            target="{{ $link['link']['target'] }}"
          />
        @endforeach
      </div>
    @endif
  </div>
</x-card>