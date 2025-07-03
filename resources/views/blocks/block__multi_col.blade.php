@set($count,count($cards))

<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-section.image />
  <x-section.header>
    <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
    <x-display>{{ $content['headline'] }}</x-display>
    <x-body>{!! $content['copy'] !!}</x-body>
    @if($content['links'])
      <x-card.footer>
        <x-button.group>
          @foreach($content['links'] as $link)
            <x-button 
              variant="{{ $loop->iteration == 1 ? 'primary' : 'outline' }}"
              label="{{ $link['link']['title'] }}"
              title="{{ $link['link']['title'] }}"
              href="{{ $link['link']['url'] }}"
              target="{{ $link['link']['target'] }}"
            />
          @endforeach
        </x-button.group>
      </x-card.footer>
    @endif
  </x-section.header>
  <x-container>
    <div 
      @class([
        'gap-gutter',
        'grid grid-cols-1',
        'px-x-large'  => $count == 1,
        'xl:grid-cols-2' => $count == 2,
        'xl:grid-cols-3' => $count == 3,
        'xl:grid-cols-4' => $count >= 3,
      ])
    >
      @if($cards)
        @foreach($cards as $card)
          <x-card
            @class(['grid grid-cols-1 xl:grid-cols-2 items-center'  => $count == 1])
            :count="$count"
            :variant="$type"
            :eyebrow="$card['eyebrow']"
            :headline="$card['headline']"
            :subhead="$card['subhead']"
            :body="$card['body']"
            :links="$card['links']"
            :image="$type == 'news' ? null : $card['image']"
          />
        @endforeach
      @endif
    </div>
  </x-container>
</x-section>