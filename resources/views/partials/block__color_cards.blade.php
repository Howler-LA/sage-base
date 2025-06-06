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
          <div 
            data-theme="{{ $config['cards']['theme'] }}"
            @class([
              'border border-foreground/50' => $config['block']['theme'] === $config['cards']['theme'],
              'bg-[var(--bg-color)] text-[var(--txt-color)]',
              'rounded-[calc((var(--card-radius))*1px)]',
              'overflow-hidden',
              'grid xl:grid-cols-2' => $items == 1,
            ])
          >
            <div
              @class([
                'xl:p-lg xl:justify-between xl:order-first' => $items == 1,
                'p-[calc((var(--card-padding))*1px)]',
                'flex flex-col items-start',
                'gap-[calc((var(--spacing-gutters))*1px)]',
              ])
            > 
              <x-eyebrow content="{{ $card['eyebrow'] }}" />
              <header class="space-y-[calc((var(--spacing-em))*1px)]">
                <x-subhead content="{{ $card['headline'] }}" />
                <x-body size="2" content="{!! $card['copy'] !!}" />
              </header>
              @if($card['links'])
                <div class="flex space-x-min">
                  @foreach($card['links'] as $link)
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
            </div>
          </div>
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