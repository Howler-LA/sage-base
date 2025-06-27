<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-columns columns="2">
    <x-columns.column class="h-full">
      <div class="sticky top-large">
        <x-columns.contained>
          <div class="space-y-small">
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
        </x-columns.contained>
      </div>
    </x-columns.column>
    <x-columns.column>
      @if(get_sub_field('cards'))
        <div class="space-y-med">
          @foreach(get_sub_field('cards') as $card)
            <x-card>
              <x-card.contained>
                <div class="h-128 bg-blue-300"></div>
              </x-card.contained>
            </x-card>
          @endforeach
        </div>
      @endif
    </x-columns.column>
  </x-columns>
</x-section>