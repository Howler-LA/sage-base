@set($columns,1)
@set($items,count(get_sub_field('cards')))

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
          'xl:grid-cols-2' => $items == 2,
          'xl:grid-cols-2' => $items == 2,
          'xl:grid-cols-3' => $items >= 3,
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