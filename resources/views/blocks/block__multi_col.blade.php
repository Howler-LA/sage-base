@php
  if ($cards) {
    $card_count = count($cards);
  } else {
    $card_count = 1;
  }
  $featured_cards = [];
  if (!empty($cards)) {
    foreach($cards as $card){
      if (!empty($card['featured'])) {
        $featured_cards[] = $card;
      }
    }
  };
  $count = $card_count - count($featured_cards);
@endphp

<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-section.image />
  <x-section.header>
    <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
    <x-display>{{ $content['headline'] }}</x-display>
    <x-body class="max-w-prose mx-auto">{!! $content['copy'] !!}</x-body>
  </x-section.header>
  <x-container>
    <div 
      @class([
        'gap-gutter',
        'grid grid-cols-1',
        '2xl:px-x-large' => $count == 1,
        'xl:grid-cols-2' => $count == 2,
        'xl:grid-cols-3' => ($count == 3) or ($count >= 4 && $type == 'person'),
        'xl:grid-cols-4' => $count >= 4 && $type != 'person',
        'items-center' => $type == 'compare',
      ])
    >
      @if($cards)
        @foreach($cards as $card)
          <x-card
            data-theme="{{ $card['themes_card'] == null ? $config['block']['themes_cards'] : $card['themes_card'] }}"
            @class([
              'grid grid-cols-1 xl:grid-cols-2 items-center'  => $count == 1,
              'grid grid-cols-1 items-center' => $count == 1 && !$card['image']
            ])
            :count="$count"
            :variant="$type"
            :eyebrow="$card['eyebrow']"
            :headline="$card['headline']"
            :subhead="$card['subhead']"
            :body="$card['body']"
            :links="$card['links']"
            :image="$type == 'news' ? null : $card['image']"
            :featured="$card['featured']"
            :list="$card['list']"
          />
        @endforeach
      @endif
    </div>
  </x-container>
  <div class="flex items-center justify-center">
    @if($content['links'])
      <div class="flex items-center">
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
      </div>
    @endif
  </div>
</x-section>