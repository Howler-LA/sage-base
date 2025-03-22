@set($columns,1)
@set($items,count(get_sub_field('cards')))

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container>
    <div 
      @class([
        'flex flex-col',
        'gap-[calc((var(--spacing-gutters))*1px)]',
        'items-center text-center',
        'mb-[calc((var(--spacing-small))*1px)]',
        'px-[calc((var(--spacing-large))*1px)]'
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
          'gap-[calc((var(--spacing-small))*1px)]',
          'lg:grid-cols-2' => $items == 2,
          'lg:grid-cols-2' => $items == 2,
          'lg:grid-cols-3' => $items >= 3,
        ])
      >
        @foreach(get_sub_field('cards') as $card)
          <div 
            data-theme="{{ $config['cards']['theme'] }}"
            @class([
              'bg-[var(--bg-color)] text-[var(--txt-color)]',
              'rounded-[calc((var(--card-radius))*1px)]',
              'overflow-hidden',
              'grid lg:grid-cols-2' => $items == 1,
            ])
          >
            @image($card['image'],'large',['class'=>'w-full h-auto block'])
            <div
              @class([
                'lg:p-[calc((var(--spacing-large))*1px)] lg:justify-between lg:order-first' => $items == 1,
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
                <div class="flex space-x-[calc((var(--spacing-min))*1px)]">
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
  </x-container>
</x-section>

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'grid',
      'grid-cols-1 gap-x-sm sm:gap-x-md',
      'xl:grid-cols-2 gap-y-sm' => $columns == 2,
      'xl:grid-cols-1 gap-y-sm' => $columns == 1,
    ])
  >
    <x-lockup
      align="{{ $columns == 2 ? 'left' : 'center' }}"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    @if(get_sub_field('cards'))
      <div 
        @class([
          'grid gap-sm grid-cols-1',
          'lg:grid-cols-2' => $items == 2,
          'lg:grid-cols-2' => $items == 2,
          'lg:grid-cols-3' => $items >= 3,
        ])
      >
        @foreach(get_sub_field('cards') as $card)
          <x-card.image_text
            variant="padded"
            items="{{ $items }}"
            data-theme="{{ $config['cards']['theme'] }}"
            image="{{ $card['image'] }}"
            key="{{ $card['eyebrow'] }}"
            subhead="{{ $card['headline'] }}"
            copy="{!! $card['copy'] !!}"
          />
        @endforeach
      </div>
    @endif
    @if($content['links'])
      <div class="flex items-center justify-center gap-2">
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