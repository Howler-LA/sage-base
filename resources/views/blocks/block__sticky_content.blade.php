<x-section data-theme="{{ $config['block']['themes'] }}" padding="none">
  <x-cols>
    <x-cols.col contained class="py-section">
      <div
        @class([
          'space-y-small xl:sticky',
          'xl:top-[calc(144px+theme(spacing.section))]' => is_user_logged_in(),
          'xl:top-[calc(112px+theme(spacing.section))]' => !is_user_logged_in(),
        ])
      >
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
      </div>
    </x-cols.col>
    <x-cols.col>
      @if($cards)
        @foreach($cards as $card)
          <div class="p-section pb-px last:pb-section bg-background">
            <x-card
              data-theme="{{ $card['themes_card'] == null ? $config['block']['themes_cards'] : $card['themes_card'] }}"
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
          </div>
        @endforeach
      @endif
    </x-cols.col>
  </x-cols>
</x-section>