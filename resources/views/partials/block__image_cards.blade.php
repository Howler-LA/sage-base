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
          <x-item 
            data-theme="{{ $config['cards']['theme'] }}"
            layout="{{ $card['featured'] ? 'featured' : '' }}"
          >
            @image($card['image'],'large',['class'=>'object-cover block aspect-[1440/1300]'])
            <x-item.content>
              <x-eyebrow content="{!! $card['eyebrow'] !!}" />
              <div class="flex flex-col gap-min">
                <x-title content="{!! $card['headline'] !!}" />
                <x-body size="2" class="font-bold" content="{!! $card['subheadline'] !!}" />
              </div>
              <x-body size="{{ $items >= 4 ? '2' : '1' }}" content="{!! $card['copy'] !!}" />
              @if($card['links'])
                <x-item.footer>
                  <x-button.group>
                    @foreach($card['links'] as $link)
                      <x-button
                        style="{{ $link['config']['style'] }}"
                        format="{{ $link['config']['format'] }}"
                        title="{!! $link['link']['title'] !!}"
                        target="{!! $link['link']['target'] !!}"
                        href="{!! $link['link']['url'] !!}"
                      >
                        {!! $link['link']['title'] !!}
                      </x-button>
                    @endforeach
                  </x-button.group>
                </x-item.footer>
              @endif
            </x-item.content>
          </x-item>
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