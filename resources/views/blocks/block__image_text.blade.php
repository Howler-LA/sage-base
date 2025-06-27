<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-columns columns="2">
    <x-columns.column>
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
    </x-columns.column>
    <x-columns.column>
      <div class="">
      </div>
    </x-columns.column>
  </x-columns>
</x-section>