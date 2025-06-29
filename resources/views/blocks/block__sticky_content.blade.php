<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-cols contained>
    <x-cols.col>
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
      @if(get_sub_field('cards'))
        @foreach(get_sub_field('cards') as $card)
          <div data-aos="fade-up" data-theme="Cream" class="border-b py-med first:pt-0 last:pb-">
            <div class="h-128 bg-background rounded-card"></div>
          </div>
        @endforeach
      @endif
    </x-cols.col>
  </x-cols>
</x-section>