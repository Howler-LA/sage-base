@set($columns,1)
@set($items,count(get_sub_field('cards')))

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container>
    <div 
      @class([
        'flex flex-col',
        'gap-[calc((var(--spacing-gutters))*1px)]',
        'items-center text-center',
        'mb-sm',
        'px-lg'
      ])
    >
      <x-eyebrow content="{!! $content['eyebrow'] !!}" />
      <header class="space-y-[calc((var(--spacing-em))*1px)]">
        <x-display content="{!! $content['headline'] !!}" />
        <x-body content="{!! $content['copy'] !!}" />
      </header>
    </div>
    @if(get_sub_field('cards'))
      <div 
        @class([
          'grid grid-cols-1',
          'gap-sm',
          'xl:grid-cols-2' => $items == 2,
          'xl:grid-cols-2' => $items == 2,
          'xl:grid-cols-3' => $items >= 3,
        ])
      >
        @foreach(get_sub_field('cards') as $key => $card)
          @unless($card['featured'])
            <x-card.image.default 
              :card="$card"
              :config="$config" 
            />
          @else
            <x-card.image.featured 
              :card="$card"
              :config="$config" 
            />
          @endunless
        @endforeach
      </div>
    @endif
    @if($content['links'])
      <div
        @class([
          'pt-sm',
          'flex items-center justify-center gap-min'
        ])
      >
        @foreach($content['links'] as $key => $link)
          <x-button 
            href="{{ $link['link']['url'] }}"
            style="{{ $link['config']['style'] }}"
            format="{{ $link['config']['format'] }}"
            label="{{ $link['link']['title'] }}" 
            target="{{ $link['link']['target'] }}"
          />
        @endforeach
      </div>
    @endif
  </x-container>
</x-section>