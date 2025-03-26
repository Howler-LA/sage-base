@set($columns,1)
@set($items,count(get_sub_field('cards')))

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'space-y-sm',
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
          'xl:grid-cols-3' => $items == 3,
          'xl:grid-cols-2 xl:grid-cols-4' => $items >= 4,
        ])
      >
        @foreach(get_sub_field('cards') as $key => $card)
          <x-card.image 
            {{-- data-theme="{{ $config['cards']['theme'] }}" --}}
            items="{{ $items }}"
            eyebrow="{!! $card['eyebrow'] !!}"
            image="{!! $card['image'] !!}"
            title="{!! $card['headline'] !!}"
            copy="{!! $card['copy'] !!}"
            links="{!! json_encode($card['links']) !!}"
          />
        @endforeach
      </div>
    @endif
  </x-container>
</x-section>
